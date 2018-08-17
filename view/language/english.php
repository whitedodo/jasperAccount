<?php
/*
 *  Created Date: 2018-08-17
 *  Subject: English.php
 *  Author: Dodo(rabbit.white@daum.net)
 *  Description:
 */

class Lang_English {
    
    private $msg;
    
    public function __construct(){
        
        $this->msg = Array (
            'english' => 'english'
            );
        
        $this->msg ['english'] = Array (
            'book' => 'book',
            'report' => 'report',
            'accType' => 'accType'
            );
        
        $this->msg ['english'] ['book'] = Array (
            'title' => 'Household', 
            'url_report' => 'IFRS (Financial Statement) Report',
            
            // Write article
            'write_title' => 'Create a record',
            'write_type' => 'Type',
            'write_category' => 'Category',
            'write_accountName' => 'Account Business Name',
            'write_account_no' => 'Account number',
            'write_subject' => 'Item',
            'write_price' => 'Unit Price',
            'write_count' => 'Quantity',
            'write_taxRate' => 'Tax rate',
            'write_regidate' => 'RegiDate',
            'write_submit' => 'Submit',
            'crud_modify' => 'Modify',
            'crud_remove' => 'Delete',
            
            // CRUD message
            'func_crud_blank' => 'Please enter a blank.',
            'func_crud_add' => 'Successfully added.',
            'func_crud_modify' => 'Successfully modified.',
            'func_crud_remove' => 'Successfully deleted.',
            
            // Read article
            'read_title' => 'Accounts',
            'read_unit' => 'Unit:',
            'read_subject' => 'Item',
            'read_balance' => 'Balance',
            'read_remark' => 'Remarks',
            'read_initial_balance' => 'Initial Balance',
            
            // Top of the article (header)
            'read_header_id' => 'ID',
            'read_header_item' => 'Item',
            'read_header_type' => 'Type',
            'read_header_category' => 'Category',
            'read_header_accountName' => 'Account Business Name',
            'read_header_accountNo' => 'Acc Unique number',
            'read_header_price' => 'Price',
            'read_header_count' => 'Quantity',
            'read_header_taxRate' => 'Tax rate',
            'read_header_tax' => 'Tax (total)',
            'read_header_money' => 'Amount',
            'read_header_balance' => 'Balance',
            'read_header_remark' => 'Remarks',
            
            // Bottom Function
            'func_write' => 'Create',
            'func_view' => 'View',
            
            // Pager
            'pager_first' => 'First',
            'pager_prev' => 'previous',
            'pager_next' => 'Next',
            'pager_last' => 'Last'
            
        );
            
        $this->msg ['english']['report'] = Array (
            'title' => 'IFRS report',
            'url_book' => 'Household'
        );
        
        $this->msg['english']['report']['fstatement'] = Array(
            'h_title' => 'Financial Statement',
            'h_current' => 'Current',
            'h_unit' => 'Unit:',
            'h_subject' => 'Subject',
            'h_price' => 'Price',
            'b_l_asset_title' => 'Asset',
            'b_l_cash' => 'Cash',
            'b_l_land' => 'Land',
            'b_l_ar' => 'Sales Receivables',
            'b_l_insurance' => 'Insurance',
            'b_l_expendables' => 'Consumables',
            'b_l_machinery' => 'Mechanical Device',
            'b_l_stock' => 'Inventory',
            'b_l_notapplicable' => 'N/A',
            'b_l_totalAsset' => 'Total Assets',
            'b_r_debt_title' => 'Debt',
            'b_r_short' => 'Short-Term borrowing',
            'b_r_midlong' => 'Mid-Long-Term borrowing',
            'b_r_bond' => 'Bond issuance',
            'b_r_totalDebt' => 'Total Debt',
            'b_r_totalCapital' => 'Capital Total',
            'b_r_c_notapplicable' => 'N/A',
            'b_r_c_equity' => 'Equity capital',
            'b_r_c_other' => 'Other Capital',
            'b_r_c_retainEarning' => 'Retained Earnings',
            'b_r_c_totalCapitalDept' => 'Capital + Debt'
        );
        
        $this->msg['english']['report']['incomestatement'] = Array(
            'title' => 'Income and Outcome Statement',
            'h_unit' => 'Unit:',
            'h_feature' => 'Functional Classification',
            'category' => 'Current',
            'sales_title' => 'Sales',
            'sales_nonappliable' => 'N/A',
            'sales_generalsale' => 'General Sales',
            'sales_interestRate' => 'interest Income',
            'sales_fdr' => 'Process Disposal Profit',
            'sales_other' => 'Other Profit',
            'totalSales' => 'Total Revenue',
            'outCost' => 'Cost',
            'outManufacturing' => 'Manufacturing costs',
            'outPurchase' => 'Buying cost',
            'outSelling' => 'Sales',
            'outShipping' => 'Transportation',
            'outAdv' => 'Advertising fee',
            'outRent' => 'Rent',
            'outMgt' => 'Management fee',
            'outSalary' => 'Payment',
            'outConsumable' => 'Consumables',
            'outGas' => 'Gas Cost',
            'outElectric' => 'Electric Cost',
            'outCommunication' => 'Communication Cost',
            'outConsumableInsurance' => 'Consumable insurance',
            'outInventory' => 'Inventory Cost',
            'outFin' => 'Financial cost',
            'outDepreciation' => 'Depreciation',
            'outOtherCost' => 'Other Cost',
            'outOther' => 'Other cost',
            'outCashDiv' => 'Cash Dividend',
            'outLodFixtures' => 'Loss of the Disposal of the Appliances',
            'outTotalCost' => 'Total cost',
            'outGovTax' => 'Government Tax',
            'outLocalGovTax' => 'Local Tax',
            'outTotalTax' => 'Total Tax',
            'outIncomeOutcome' => 'Net profit / loos'
        );
        
        $this->msg['english']['report']['pl_cash'] = Array(
            'pl_cash_f_title' => 'Cashflow Statement Table',
            'pl_indirect' => 'Indirect Method',
            'pl_cash_f_unit' => 'Unit:',
            'pl_cash_f_operate_title' => '1. Sales activity cash flow',
            'pl_cash_f_netIncomeOutcomewithoutTax' => '1. Net profit/net loss before tax cost deduction',
            'pl_cash_f_cashwithoutflow' => 'Cost without cash flow',
            'pl_cash_f_depreciation' => 'Depreciation Ratio',
            'pl_cash_f_LoDFixture' => 'Loss of equipment disposal',
            'pl_cash_f_revenuewithoutcashflow' => 'Profit without cash flow',
            'pl_cash_f_rev_interest' => 'Interest income',
            'pl_cash_f_changeAssetDebtActivities' => 'Accounts and debts due to sales activities',
            'pl_cash_f_ar' => 'Sales receivables',
            'pl_cash_f_inventories' => 'Inventory Asset',
            'pl_cash_f_accPayable' => 'Buying Debt',
            'pl_cash_f_salesGeneCash' => 'Creating cash due to sales activities',
            'pl_cash_f_interestPayment' => 'Interest payment',
            'pl_cash_f_govTax' => 'Government Tax',
            'pl_cash_f_LocalGovTax' => 'Local Government Tax',
            'pl_cash_f_investmentActivityCashFlow' => '2. Investment activity cash flow',
            'pl_cash_f_inflowfrominvestActivity' => 'Cash inflow due to investment activities',
            'pl_cash_f_DisposalOfFixtures' => 'Process Disposal Profit',
            'pl_cash_f_addExpenseWithoutCash' => 'Cash outflow due to investment activities',
            'pl_cash_f_acquiOfEquipment' => 'Acquisition of fixtures',
            'pl_cash_f_financingActi' => '3. Financial activity cash flow',
            'pl_cash_f_addOfExpensesWithoutCashoutflow' => 'Cash inflow due to financial activities',
            'pl_cash_f_IssuanceOfBonds' => 'Issuance of bonds (bonds)',
            'pl_cash_f_CashOutflowFinct' => 'Cash outflow due to financial activities',
            'pl_cash_f_CashDiv' => 'Cash Dividend',
            'pl_cash_f_CashAndCashEquip' => 'Cash and Cash Assets',
            'pl_cash_f_BaseCashAndCashEquip' => 'Basic Cash and Cash Assets',
            'pl_cash_f_LastCashAndCashEquip' => 'Final Cash and Cash Assets'
        );
        
        $this->msg['english']['report']['changeInEquity'] = Array(
            'chE_title' => 'Change in Equity Capital',
            'chE_unit' => 'Unit:',
            'chE_h_capital' => 'Capitals',
            'chE_h_retainEarning' => 'Retained Earnings',
            'chE_h_total' => 'Total',
            'chE_l_startDate' => 'Start Date',
            'chE_l_capitalNotApplicable' => 'N/A',
            'chE_l_capitalEquity' => 'Equity Capital',
            'chE_l_capitalOther' => 'Other Capital',
            'chE_l_pl_NetIncomeOutcome' => 'Net profit / Net loss',
            'chE_l_pl_CashDividend' => 'Cash Dividend',
            'chE_f_endDateTitle' => 'Final Date',
            'chE_f_totalTitle' => '= Total of Sum'
            
        );
        
        $this->msg['english']['accType'] = Array(
            'type_income' => 'Income',
            'type_outcome' => 'Outcome',
            'type_capital' => 'Capital',
            'type_debt' => 'Debt',
            'type_asset' => 'Asset'
        );
        
        $this->msg['english']['accType']['accCategory'] = Array(
            
            'type_not_selected' => 'Not Selected',
            'type_not_applicable' => 'N/A',
            
            // 수입에 관한 항목
            // 수입 - 공통항목 - 해당없음
            'type_income_general_sales' => 'General sales',
            'type_income_interest_revenue' => 'Interest income',
            'type_income_fdr' => 'Equipment disposal Revenue',
            'type_income_other_revenue' => 'Other Revenue',
            
            // 지출에 관한 항목'
            'type_cost_manufacturing' => 'Manufacturing Cost',
            'type_cost_purchase' => 'Buying costs',
            'type_cost_advertising' => 'Advertising cost',
            'type_cost_shipping' => 'Conditioning costs',
            'type_cost_rent' => 'Rent Cost',
            'type_cost_salary' => 'Paying Cost',
            'type_cost_consumable' => 'Consumable Cost',
            'type_cost_gas' => 'Gas Cost',
            'type_cost_electric' => 'Electric cost',
            'type_cost_communication' => 'Communication Cost',
            'type_cost_consumable_insurance' => 'Consumable Insurance',
            'type_cost_inventory' => 'Inventory cost',
            'type_cost_interest_expense' => 'Interest cost',
            'type_cost_depreciation' => 'Depreciation Cost (Logic Cost)',
            'type_cost_other' => 'Other cost',
            'type_cost_cash_dividend' => 'Cash dividend',
            'type_cost_lodfixture' => 'Loss of disposal of equipment',
            'type_cost_govTax' => 'Government Tax',
            'type_cost_localGovTax' => 'Local Government Tax',
            
            // 자본에 관한 항목
            // 지출 - 공통항목 - 해당없음
            'type_capital_equity' => 'Equity Capital',
            'type_captial_other' => 'Other Capital',
            
            // 부채에 관한 항목
            'type_debt_short_borrowing' => 'Short-Term borrowing',
            'type_debt_mid_borrowing' => 'Mid-Long-Term borrowing ',
            'type_debt_bond_issuance' => 'Bond issuance',
            
            // 자산에 관한 항목
            'type_asset_land' => 'Land',
            'type_asset_ar' => 'Receivables for Sale',
            'type_asset_insurance' => 'Insurance',
            'type_asset_expendables' => 'Consumables',
            'type_asset_machinery' => 'Mechanical Device',
            'type_asset_stock' => 'Stock Assets',
            // 자산 - 공통항목 - 해당없음
            
         );
        
    }
    
    public function getMsg(){
        return $this->msg;
    }
    
}

?>
