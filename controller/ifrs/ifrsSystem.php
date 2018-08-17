<?php
/*
	2018-08-01	
	Author: Jasper(rabbit.white@daum.net)
	FileName: ifrsSystem.php
	Goal: Jasper의 IFRS 시스템 (IFRS system)
	Description:	
	1. 2018-08-02 / Jasper / IFRS (재무상태표)
	2. 2018-08-03 / Jasper / IFRS (1. 재무상태표, 2. 손익계산서)
	3. 2018-08-03 / Jasper / IFRS (3. 현금흐름표, 4. 자본변동표)
	4. 2018-08-03 / Jasper / IFRS 보고서 연동 작업(Reporting.php)
	5. 2018-08-17 / Jasper / IFRS - 기능개선(다국어 지원 추가)

*/
    /// 0. 공통 임시변수
      
    /// 1. 대차대조표(Balance Sheets)
	// 차변(왼쪽 - Left)
    $b_a_assetName = $languagePack->getMessage('accType', null, 'type_asset'); 	// 자산
    $usrType = $accountFn->getSearchTypeID($b_a_assetName);
	$b_l_balance = $jasper->prevBalance($boardName, $endDate);      // 잔액(Balance)	
	
	$b_a_LandName = $languagePack->getMessage('accType', 'accCategory', 'type_asset_land'); // 토지
	$category = $accountFn->getSearchCategoryID($usrType, $b_a_LandName);
	$b_l_land = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);

	$b_a_ArName = $languagePack->getMessage('accType', 'accCategory', 'type_asset_ar'); 	// 매출채권
	$category = $accountFn->getSearchCategoryID($usrType, $b_a_ArName);	
    $b_l_ar = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
	
    $b_a_InsuranceName = $languagePack->getMessage('accType', 'accCategory', 'type_asset_insurance'); 	// 보험
	$category = $accountFn->getSearchCategoryID($usrType, $b_a_InsuranceName);	
	$b_l_insurance = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
	
	$b_a_ExpendablesName = $languagePack->getMessage('accType', 'accCategory', 'type_asset_expendables'); 	// 소모품
	$category = $accountFn->getSearchCategoryID($usrType, $b_a_ExpendablesName);	
	$b_l_expendables = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
	
	$b_a_MachinaryName = $languagePack->getMessage('accType', 'accCategory', 'type_asset_machinery'); 	// 기계장치
	$category = $accountFn->getSearchCategoryID($usrType, $b_a_MachinaryName );	
	$b_l_machinery = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);

	$b_a_StockName = $languagePack->getMessage('accType', 'accCategory', 'type_asset_stock'); 	// 재고
	$category = $accountFn->getSearchCategoryID($usrType, $b_a_StockName );	
	$b_l_stock = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
	
	$b_a_NotApplicableName = $languagePack->getMessage('accType', 'accCategory', 'type_not_applicable'); 	// 해당없음
	$category = $accountFn->getSearchCategoryID( $usrType, $b_a_NotApplicableName );	
	$b_l_applicable = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
  
    $b_l_totalOfAsset = $b_l_balance + $b_l_land + $b_l_ar + 
                        $b_l_insurance + $b_l_expendables + $b_l_machinery + 
                        $b_l_stock + $b_l_applicable;
	
	// 대변(오른쪽-Right)
    $b_d_DebtName = $languagePack->getMessage('accType', null, 'type_debt'); 	// 부채
    $usrType = $accountFn->getSearchTypeID( $b_d_DebtName);
    
    $b_d_ShortName = $languagePack->getMessage('accType', 'accCategory', 'type_debt_short_borrowing'); 	// 단기차입금
    $category = $accountFn->getSearchCategoryID($usrType, $b_d_ShortName);
	$b_r_shortBorrowing = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
	
	$b_d_MidName = $languagePack->getMessage('accType', 'accCategory', 'type_debt_mid_borrowing'); 	// 중장기차입금
	$category = $accountFn->getSearchCategoryID($usrType, $b_d_MidName );
    $b_r_longBorrowing = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
    
    $b_d_BondName = $languagePack->getMessage('accType', 'accCategory', 'type_debt_bond_issuance'); 	// 채권발행
    $category = $accountFn->getSearchCategoryID($usrType, $b_d_BondName );
    $b_r_bondIssuance = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
    $b_r_sumOfDebt = $b_r_shortBorrowing + $b_r_longBorrowing + $b_r_bondIssuance;
    
    
    $b_c_CapitalName = $languagePack->getMessage('accType', null, 'type_capital'); 	// 자본
    $usrType = $accountFn->getSearchTypeID( $b_c_CapitalName );
    
    $b_c_NotApplicableName = $languagePack->getMessage('accType', 'accCategory', 'type_not_applicable'); // 해당없음
    $category = $accountFn->getSearchCategoryID($usrType, $b_c_NotApplicableName);
    $b_r_n_capital = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
    
    $b_c_EquityName = $languagePack->getMessage('accType', 'accCategory', 'type_capital_equity'); // 자기자본
    $category = $accountFn->getSearchCategoryID($usrType, $b_c_EquityName );
    $b_r_eq_capital = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
    
    $b_c_OtherName = $languagePack->getMessage('accType', 'accCategory', 'type_captial_other'); // 타인자본
    $category = $accountFn->getSearchCategoryID($usrType, $b_c_OtherName );
    $b_r_other_capital = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
    $b_r_retain_capital = $b_l_totalOfAsset - $b_r_sumOfDebt - ($b_r_n_capital + $b_r_eq_capital + $b_r_other_capital);
	
	$b_r_sumOfCapital = $b_r_n_capital + $b_r_eq_capital + $b_r_other_capital + $b_r_retain_capital;
	
	$b_r_sumOfAsset = $b_r_sumOfDebt + $b_r_sumOfCapital;
	
	
	/// 2. 손익계산서 기능별(Profit and Loss Statement)
	$pl_f_r_IncomeName = $languagePack->getMessage('accType', null, 'type_income'); 	// 수입
	$usrType = $accountFn->getSearchTypeID( $pl_f_r_IncomeName );

	$pl_f_r_NotApplicableName = $languagePack->getMessage('accType', 'accCategory', 'type_not_applicable'); 	// 해당없음
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_r_NotApplicableName );
	$pl_f_rev_none = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_r_IncomeGeneralSaleName = $languagePack->getMessage('accType', 'accCategory', 'type_income_general_sales'); 	// 일반매출
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_r_IncomeGeneralSaleName );
	$pl_f_rev_gene = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_r_IncomeInterestRevenueName = $languagePack->getMessage('accType', 'accCategory', 'type_income_interest_revenue'); 	// 이자수익
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_r_IncomeInterestRevenueName );
	$pl_f_rev_interest = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);	
    
	$pl_f_r_FDRName = $languagePack->getMessage('accType', 'accCategory', 'type_income_fdr'); 	// 비품처분수익
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_r_FDRName);
	$pl_f_rev_disposalRevenue = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);	
    
	$pl_f_r_OtherRevenueName = $languagePack->getMessage('accType', 'accCategory', 'type_income_fdr'); 	// 비품처분수익
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_r_OtherRevenueName);
	$pl_f_rev_other = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	$pl_f_rev_total = $pl_f_rev_none + $pl_f_rev_gene + 
                   	$pl_f_rev_disposalRevenue + $pl_f_interest + $pl_f_rev_other;
                   	
    $pl_f_o_OutcomeName = $languagePack->getMessage('accType', null, 'type_outcome'); 	// 지출
    $usrType = $accountFn->getSearchTypeID($pl_f_o_OutcomeName);
  
    $pl_f_o_ManufacturingName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_manufacturing');  // 제조비용
    $category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_ManufacturingName );
	$pl_f_out_manufacturing = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_o_PurchaseName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_purchase');  // 매입비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_PurchaseName );
	$pl_f_out_purchase = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	$pl_f_out_totalCost = $pl_f_out_manufacturing + $pl_f_out_purchase;
  
	$pl_f_o_AdvName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_advertising');  // 광고비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_AdvName);
	$pl_f_out_adv = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_o_ShippingName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_shipping');  // 운송비
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_ShippingName);
	$pl_f_out_ship = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_o_RentName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_rent');  // 임대료
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_RentName);
	$pl_f_out_rent = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_out_sales = $pl_f_out_ship + $pl_f_out_adv + $pl_f_out_rent;
	
	$pl_f_o_SalaryName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_salary');  // 급여비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_SalaryName);
	$pl_f_out_salary = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_o_ConsumableName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_consumable');  // 소모품비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_ConsumableName );
	$pl_f_out_consumable = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_o_GasName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_gas');  // 가스비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_GasName );
	$pl_f_out_gas = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_o_ElectricName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_electric');  // 전기비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_ElectricName);
	$pl_f_out_electric = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_o_CommunicationName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_communication');  // 통신비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_CommunicationName);
	$pl_f_out_communication = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_o_ConsumableInsuranceName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_consumable_insurance');  // 소모성 보험
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_ConsumableInsuranceName);
	$pl_f_out_insurance = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_out_management = $pl_f_out_salary + $pl_f_out_consumable +
	                       $pl_f_out_gas + $pl_f_out_electric + 
	                       $pl_f_out_communication + $pl_f_out_insurance;
	
    $pl_f_o_InventoryName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_inventory');  // 재고비용
    $category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_InventoryName);
	$pl_f_out_inventory = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_o_InventoryExpenseName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_interest_expense');  // 이자비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_InventoryExpenseName );
	$pl_f_out_interest = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_o_DepreciationName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_depreciation');  // 감가상각비
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_DepreciationName );
	$pl_f_out_depreciation = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);

	$pl_f_o_OtherName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_depreciation');  // 기타비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_OtherName);
	$pl_f_out_other = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_o_CashDividendName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_cash_dividend');  // 현금배당
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_CashDividendName );
	$pl_f_out_cashdividend = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_o_LodFixtureName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_lodfixture');  // 비품처분손실
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_LodFixtureName);
	$pl_f_out_fixtures = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_out_sumOfother = $pl_f_out_other + $pl_f_out_cashdividend + $pl_f_out_fixtures;
	
	$pl_f_out_totalCost = $pl_f_out_totalCost + $pl_f_out_sales + 
	                      $pl_f_out_management + $pl_f_out_inventory +
	                      $pl_f_out_interest + $pl_f_out_depreciation +
	                      $$pl_f_out_sumOfother;
	
    $pl_f_o_GovTaxName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_govTax');  // 정부세금(Gov Tax)
    $category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_GovTaxName );
	$pl_f_out_govTax = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$pl_f_o_LocalGovTaxName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_localGovTax');  // 지방세금(Local Gov Tax)
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_o_LocalGovTaxName);
	$pl_f_out_localGovtax = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	$pl_f_out_tax = $pl_f_out_govTax + $pl_f_out_localGovtax;
	
	$pl_f_out_totalIncome = $pl_f_rev_total - $pl_f_out_totalCost - $pl_f_out_tax;
	
	/// 3. 현금흐름표
	$cash_f_income = $pl_f_rev_total - $pl_f_out_totalCost;

	$cash_f_r_OutcomeName = $languagePack->getMessage('accType', null, 'type_outcome'); 	// 지출
	$usrType = $accountFn->getSearchTypeID( $cash_f_r_OutcomeName );  	
	
	$cash_f_r_DepreciationName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_depreciation');  // 감가상각비
	$category = $accountFn->getSearchCategoryID($usrType, $cash_f_r_DepreciationName );
	$cash_f_depreciation = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$cash_f_r_LODName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_lodfixture');  // 비품처분손실
	$category = $accountFn->getSearchCategoryID($usrType, $cash_f_r_LODName);
	$cash_f_disposalAsset = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);		

	$cash_f_sumOfdisposalPlus = $cash_f_depreciation + $cash_f_disposalAsset;
	
	$cash_f_r_IncomeName = $languagePack->getMessage('accType', null, 'type_income'); 	// 수입
	$usrType = $accountFn->getSearchTypeID ( $cash_f_r_IncomeName );
	
	$cash_f_r_InterestName = $languagePack->getMessage('accType', 'accCategory', 'type_income_interest_revenue'); 	// 이자수익
	$category = $accountFn->getSearchCategoryID($usrType, $cash_f_r_InterestName );	
    $cash_f_rev_interest = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
    
    $cash_f_r_AssetName = $languagePack->getMessage('accType', null, 'type_asset'); 	// 자산
    $usrType = $accountFn->getSearchTypeID( $cash_f_r_AssetName );
    
    $cash_f_r_ARName = $languagePack->getMessage('accType', 'accCategory', 'type_asset_ar'); 	// 매출채권
    $category = $accountFn->getSearchCategoryID($usrType, $cash_f_r_ARName );	
    $cash_f_ar = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
    
    $cash_f_r_StockName = $languagePack->getMessage('accType', 'accCategory', 'type_asset_stock'); 	// 재고
    $category = $accountFn->getSearchCategoryID($usrType, $cash_f_r_StockName );	
    $cash_f_stock = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
    
    $cash_f_r_DebtName = $languagePack->getMessage('accType', null, 'type_debt'); 	// 부채
    $usrType = $accountFn->getSearchTypeID( $cash_f_r_DebtName );
    
    $cash_f_r_ShortName = $languagePack->getMessage('accType', 'accCategory', 'type_debt_short_borrowing'); 	// 단기차입금
    $category = $accountFn->getSearchCategoryID($usrType, $cash_f_r_ShortName );
    $cash_f_shortBorrowing = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
    
    $cash_f_r_MidName = $languagePack->getMessage('accType', 'accCategory', 'type_debt_mid_borrowing'); 	// 중장기차입금
    $category = $accountFn->getSearchCategoryID($usrType, $cash_f_r_MidName );
    $cash_f_longBorrowing = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
    $cash_f_debt = $cash_f_shortBorrowing + $cash_f_longBorrowing;
    
    $cash_f_sumOfdebt = $cash_f_ar + $cash_f_stock + $cash_f_debt;
    
    $cash_f_totalSales = $cash_f_income + ($cash_f_sumOfdisposalPlus + $cash_f_rev_interest - $cash_f_sumOfdebt);
    
    $cash_f_out_OutcomeName = $languagePack->getMessage('accType', null, 'type_outcome'); 	// 지출
    $usrType = $accountFn->getSearchTypeID( $cash_f_out_OutcomeName );
    
    $cash_f_out_InterestExpenseName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_interest_expense'); 	// 이자비용
    $category = $accountFn->getSearchCategoryID($usrType, $cash_f_out_InterestExpenseName );
    $cash_f_out_interest = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
    
    $cash_f_out_GovTaxName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_govTax'); 	// 정부세금
    $category = $accountFn->getSearchCategoryID($usrType, $cash_f_out_GovTaxName);	
	$cash_f_out_Govtax = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$cash_f_out_LocalGovTaxName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_localGovTax'); 	// 지방정부 세금
	$category = $accountFn->getSearchCategoryID($usrType, $cash_f_out_LocalGovTaxName);
	$cash_f_out_LocalGovtax = $jasper->sumOfvalue($usrType, $category, $boardName, $startDate, $endDate);
	
	$cash_f_totalIncome = $cash_f_totalSales - ( $cash_f_out_interest + $cash_f_out_tax + $cash_f_out_Govtax + $cash_f_out_LocalGovtax );
    
	$cash_f_IncomeName = $languagePack->getMessage('accType', null, 'type_income'); 	// 수입
	$usrType = $accountFn->getSearchTypeID( $cash_f_IncomeName );
    
	$cash_f_acqDisposalFacilityName = $languagePack->getMessage('accType', 'accCategory', 'type_income_fdr'); 	// 비품처분수익
	$category = $accountFn->getSearchCategoryID($usrType, $cash_f_acqDisposalFacilityName );	
    $cash_f_acqDisposalFacility = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
    
    $cash_f_OutcomeName = $languagePack->getMessage('accType', null, 'type_outcome'); 	// 지출
    $usrType = $accountFn->getSearchTypeID( $cash_f_OutcomeName );
    
    $cash_f_acqPurchaseCostName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_purchase'); 	// 매입비용
    $category = $accountFn->getSearchCategoryID($usrType, $cash_f_acqPurchaseCostName );	
    $cash_f_acqPurchaseCost = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
	
	$cash_f_InvestmentActivity = $cash_f_acqPurchaseCost - $cash_f_acqDisposalFacility;
    
	$cash_f_DebtName = $languagePack->getMessage('accType', null, 'type_debt'); 	// 부채
	$usrType = $accountFn->getSearchTypeID( $cash_f_DebtName );
    
	$cash_f_IssuanceBondName = $languagePack->getMessage('accType', 'accCategory', 'type_debt_bond_issuance'); 	// 채권발행
	$category = $accountFn->getSearchCategoryID($usrType, $cash_f_IssuanceBondName );	
	$cash_f_issuanceBond = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
	
	$cash_f_OutcomeName = $languagePack->getMessage('accType', null, 'type_outcome'); 	// 지출
	$usrType = $accountFn->getSearchTypeID( $cash_f_OutcomeName );
	$cash_f_acqPurchaseCostName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_cash_dividend'); 	// 현금배당
	$category = $accountFn->getSearchCategoryID($usrType, $cash_f_acqPurchaseCostName );	
    $cash_f_acqPurchaseCost = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $endDate);
	
    $cash_f_FinancialActivity = $cash_f_acqPurchaseCost - $cash_f_issuanceBond;
    
	// 현금성자산
	$cash_f_totalAssets = $cash_f_totalIncome - $cash_f_InvestmentActivity + $cash_f_FinancialActivity;
	
    // 시작일자(기초) 기준 - 현금성자산(손익계산서 식)
	$pl_f_be_r_IncomeName = $languagePack->getMessage('accType', null, 'type_income'); 	// 수입
	$usrType = $accountFn->getSearchTypeID( $pl_f_be_r_IncomeName );
	
	$pl_f_be_r_NotApplicableName = $languagePack->getMessage('accType', 'accCategory', 'type_not_applicable'); 	// 해당없음
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_r_NotApplicableName );
	$pl_f_be_rev_none = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_r_IncomeGeneralSaleName = $languagePack->getMessage('accType', 'accCategory', 'type_income_general_sales'); 	// 일반매출
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_r_IncomeGeneralSaleName );
	$pl_f_be_rev_gene = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_r_IncomeInterestRevenueName = $languagePack->getMessage('accType', 'accCategory', 'type_income_interest_revenue'); 	// 이자수익
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_r_IncomeInterestRevenueName );
	$pl_f_be_rev_interest = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_r_FDRName = $languagePack->getMessage('accType', 'accCategory', 'type_income_fdr'); 	// 비품처분수익
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_r_FDRName);
	$pl_f_be_rev_disposalRevenue = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_r_OtherRevenueName = $languagePack->getMessage('accType', 'accCategory', 'type_income_fdr'); 	// 비품처분수익
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_r_OtherRevenueName);
	$pl_f_be_rev_other = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	$pl_f_be_rev_total = $pl_f_be_rev_none + $pl_f_be_rev_gene +
	$pl_f_be_rev_disposalRevenue + $pl_f_be_interest + $pl_f_be_rev_other;
	
	$pl_f_be_o_OutcomeName = $languagePack->getMessage('accType', null, 'type_outcome'); 	// 지출
	$usrType = $accountFn->getSearchTypeID($pl_f_be_o_OutcomeName);
	
	$pl_f_be_o_ManufacturingName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_manufacturing');  // 제조비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_ManufacturingName );
	$pl_f_be_out_manufacturing = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_o_PurchaseName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_purchase');  // 매입비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_PurchaseName );
	$pl_f_be_out_purchase = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	$pl_f_be_out_totalCost = $pl_f_be_out_manufacturing + $pl_f_be_out_purchase;
	
	$pl_f_be_o_AdvName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_advertising');  // 광고비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_AdvName);
	$pl_f_be_out_adv = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_o_ShippingName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_shipping');  // 운송비
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_ShippingName);
	$pl_f_be_out_ship = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_o_RentName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_rent');  // 임대료
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_RentName);
	$pl_f_be_out_rent = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_out_sales = $pl_f_be_out_ship + $pl_f_be_out_adv + $pl_f_be_out_rent;
	
	$pl_f_be_o_SalaryName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_salary');  // 급여비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_SalaryName);
	$pl_f_be_out_salary = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_o_ConsumableName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_consumable');  // 소모품비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_ConsumableName );
	$pl_f_be_out_consumable = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_o_GasName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_gas');  // 가스비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_GasName );
	$pl_f_be_out_gas = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_o_ElectricName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_electric');  // 전기비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_ElectricName);
	$pl_f_be_out_electric = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_o_CommunicationName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_communication');  // 통신비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_CommunicationName);
	$pl_f_be_out_communication = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_o_ConsumableInsuranceName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_consumable_insurance');  // 소모성 보험
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_ConsumableInsuranceName);
	$pl_f_be_out_insurance = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_out_management = $pl_f_be_out_salary + $pl_f_be_out_consumable +
	                          $pl_f_be_out_gas + $pl_f_be_out_electric + 
	                          $pl_f_be_out_communication + $pl_f_be_out_insurance;
	
	$pl_f_be_o_InventoryName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_inventory');  // 재고비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_InventoryName);
	$pl_f_be_out_inventory = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_o_InventoryExpenseName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_interest_expense');  // 이자비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_InventoryExpenseName );
	$pl_f_be_out_interest = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_o_DepreciationName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_depreciation');  // 감가상각비
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_DepreciationName );
	$pl_f_be_out_depreciation = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_o_OtherName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_depreciation');  // 기타비용
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_OtherName);
	$pl_f_be_out_other = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_o_CashDividendName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_cash_dividend');  // 현금배당
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_CashDividendName );
	$pl_f_be_out_cashdividend = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_o_LodFixtureName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_lodfixture');  // 비품처분손실
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_LodFixtureName);
	$pl_f_be_out_fixtures = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_out_sumOfother = $pl_f_be_out_other + $pl_f_be_out_cashdividend + $pl_f_be_out_fixtures;
	
	$pl_f_be_out_totalCost = $pl_f_be_out_totalCost + $pl_f_be_out_sales +
	$pl_f_be_out_management + $pl_f_be_out_inventory +
	$pl_f_be_out_interest + $pl_f_be_out_depreciation +
	$$pl_f_be_out_sumOfother;
	
	$pl_f_be_o_GovTaxName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_govTax');  // 정부세금(Gov Tax)
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_GovTaxName );
	$pl_f_be_out_govTax = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	
	$pl_f_be_o_LocalGovTaxName = $languagePack->getMessage('accType', 'accCategory', 'type_cost_localGovTax');  // 지방세금(Local Gov Tax)
	$category = $accountFn->getSearchCategoryID($usrType, $pl_f_be_o_LocalGovTaxName);
	$pl_f_be_out_localGovtax = $jasper->sumOfvalue($usrType, $category, $boardName, $initialStartDate, $initialEndDate);
	$pl_f_be_out_tax = $pl_f_be_out_govTax + $pl_f_be_out_localGovtax;
	
	$pl_f_be_out_totalIncome = $pl_f_be_rev_total - $pl_f_be_out_totalCost - $pl_f_be_out_tax;
	
	$cash_f_totalBeforeAssets = ($pl_f_be_out_totalIncome - $pl_f_be_out_tax);
  
    // 기말 자산
    $cash_f_totalAfterAssets = $cash_f_totalAssets + $cash_f_totalBeforeAssets; 
	
	/// 4. 자본변동표

    // 재무상태표
    // 차변(왼쪽 - Left)
    $chE_b_r_totalOfDebt = $b_r_sumOfDebt;
    $chE_b_l_totalOfAsset = $b_l_totalOfAsset;
    $chE_b_r_n_capital = $b_r_n_capital;
    $chE_b_r_eq_capital = $b_r_eq_capital;
    $chE_b_r_other_capital = $b_r_other_capital;
    
    $chE_pl_f_out_totalIncome = $pl_f_out_totalIncome;
    $chE_pl_f_out_tax = $pl_f_out_tax;
    
    $chE_b_r_retain_capital = $chE_b_l_totalOfAsset - chE_b_l_totalOfDebt - 
                            ($chE_b_r_n_capital + $chE_b_r_eq_capital + $chE_b_r_other_capital);
    
    $chE_b_r_sumOfCapital = $b_r_sumOfCapital;
    
    $chE_result_capital = $chE_b_r_n_capital + $chE_b_r_eq_capital + $chE_b_r_other_capital;
    
    $chE_pl_netIncome = $chE_pl_f_out_totalIncome - $chE_pl_f_out_tax;  // 당기(손익/손실)
    $chE_pl_cashDivided = $pl_f_out_cashdividend;                       // 
    
    $chE_pl_retain_capital = $chE_pl_netIncome - $chE_pl_cashDivided;
    	
    $chE_result_retain_capital = $chE_pl_retain_capital;
    
    $chE_tmp_l_sumOfTotal = $chE_result_capital + $chE_result_retain_capital;
    $chE_tmp_r_sumOfTotal = $chE_b_r_n_capital + $chE_b_r_eq_capital + $chE_b_r_other_capital +
                            $chE_pl_netIncome + $chE_pl_cashDivided ;
  
//  echo $chE_tmp_l_sumOfTotal . "-" . $chE_tmp_r_sumOfTotal;

    $chE_result_sumOfTotal = $chE_result_capital + $chE_result_retain_capital ;
?>