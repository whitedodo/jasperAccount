<?php
/*
 *  Created Date: 2018-08-17
 *  Subject: ko-kr.php
 *  Author: Dodo(rabbit.white@daum.net)
 *  Description:
*/

class Lang_Kokr{
    
    private $msg;
    
    public function __construct(){
        
        $this->msg = Array(
            'ko-kr' => 'ko-kr'
        );
        
        $this->msg['ko-kr'] = Array(
            'book' => 'book',
            'report' => 'report',
            'accType' => 'accType'
        );
        
        $this->msg['ko-kr']['book'] = Array(
            'title' => '가계부',
            'url_report' => 'IFRS(재무제표) 보고서',
            
            // 글 작성
            'write_title' => '일지작성',
            'write_type' => '구분',
            'write_category' => '카테고리',
            'write_accountName' => '상호명',
            'write_account_no' => '계좌번호',
            'write_subject' => '항목명',
            'write_price' => '단가',
            'write_count' => '수량',
            'write_taxRate' => '세금비율',
            'write_regidate' => '일자',
            'write_submit' => '등록',
            'crud_modify' => '수정',
            'crud_remove' => '삭제',
            
            // CRUD 메시지
            'func_crud_blank' => '빈칸을 입력하세요.',
            'func_crud_add' => '성공적으로 추가되었습니다.',
            'func_crud_modify' => '성공적으로 수정되었습니다.',
            'func_crud_remove' => '성공적으로 삭제되었습니다.',
            
            // 글 읽기
            'read_title' => '가계부',
            'read_unit' => '단위: ',
            'read_subject' => '항목명',
            'read_balance' => '잔액',
            'read_remark' => '비고',
            'read_initial_balance' => '초기잔액',
            
            // 글 상단(헤더)
            'read_header_id' => '번호',
            'read_header_item' => '항목정보',
            'read_header_type' => '구분',
            'read_header_category' => '카테고리',
            'read_header_accountName' => '상호명',
            'read_header_accountNo' => '고유번호',
            'read_header_price' => '가격',
            'read_header_count' => '수량',
            'read_header_taxRate' => '세금비율',
            'read_header_tax' => '세금(계)',
            'read_header_money' => '금액',
            'read_header_balance' => '잔액',
            'read_header_remark' => '비고',
            
            // 하단 기능(Function)
            'func_write' => '작성',
            'func_view' =>  '보기',
            
            // 페이저(Pager)
            'pager_first' => '처음',
            'pager_prev' => '이전',
            'pager_next' => '다음',
            'pager_last' => '마지막'
            
        );
        
        $this->msg['ko-kr']['report'] = Array(
            'title' => 'IFRS 보고서',
            'url_book' => '가계부'
        );
        
        $this->msg['ko-kr']['report']['fstatement'] = Array(
            'title' => '재무상태표',
            'h_current' => '현재',
            'h_unit' => '단위:',
            'h_subject' => '과목',
            'h_price' => '금액',
            'b_l_asset_title' => '자산',
            'b_l_cash' => '현금',
            'b_l_land' => '토지',
            'b_l_ar' => '매출채권',
            'b_l_insurance' => '보험',
            'b_l_expendables' => '소모품',
            'b_l_machinery' => '기계장치',
            'b_l_stock' => '재고',
            'b_l_notapplicable' => '해당없음',
            'b_l_totalAsset' => '자산총계',
            'b_r_debt_title' => '부채',
            'b_r_short' => '단기차입금',
            'b_r_midlong' => '중장기차입금',
            'b_r_bond' => '채권발행',
            'b_r_totalDebt' => '부채총계',
            'b_r_totalCapital' => '자본총계',
            'b_r_c_notapplicable' => '해당없음',
            'b_r_c_equity' => '자기자본',
            'b_r_c_other' => '타인자본',
            'b_r_c_retainEarning' => '이익잉여금',
            'b_r_c_totalCapitalDept' => '자본+부채'
        );
        
        $this->msg['ko-kr']['report']['incomestatement'] = Array(
            'title' => '손익계산서',
            'h_unit' => '단위:',
            'h_feature' => '기능별 분류',
            
            'category' => '과목',
            'sales_title' => '매출액',
            'sales_nonappliable' => '해당없음',
            'sales_generalsale' => '일반매출',
            'sales_interestRate' => '이자수익',
            'sales_fdr' => '비품처분수익',
            'sales_other' => '기타수익',
            'totalSales' => '총수익',
            'outCost' => '원가',
            'outManufacturing' => '제조비용',
            'outPurchase' => '매입비용',
            'outSelling' => '판매비',
            'outShipping' => '운송비',
            'outAdv' => '광고비',
            'outRent' => '임대료',
            'outMgt' => '관리비',
            'outSalary' => '급여비',
            'outConsumable' => '소모품비',
            'outGas' => '가스비',
            'outElectric' => '전기비',
            'outCommunication' => '통신비',
            'outConsumableInsurance' => '소모성보험',
            'outInventory' => '재고비용',
            'outFin' => '금융비용',
            'outDepreciation' => '감가상각비',
            'outOtherCost' => '기타비용',
            'outOther' => '기타비용',
            'outCashDiv' => '현금배당',
            'outLodFixtures' => '비품처분손실',
            'outTotalCost' => '총비용',
            'outGovTax' => '정부세금',
            'outLocalGovTax' => '지방세금',
            'outTotalTax' => '총 세금',
            'outIncomeOutcome' => '당기순이익/당기순손실'
        );
        
        $this->msg['ko-kr']['report']['pl_cash'] = Array(
            'pl_cash_f_title' => '현금흐름표',
            'pl_indirect' => '간접방법',
            'pl_cash_f_unit' => '단위:',
            'pl_cash_f_operate_title' => '1. 영업활동 현금흐름',
            'pl_cash_f_netIncomeOutcomewithoutTax' => '1. 세금비용차감전순이익/순손실',
            'pl_cash_f_cashwithoutflow' => '현금 흐름이 없는 비용',
            'pl_cash_f_depreciation' => '감가상각비',
            'pl_cash_f_LoDFixture' => '비품처분손실',
            'pl_cash_f_revenuewithoutcashflow' => '현금 흐름이 없는 수익',
            'pl_cash_f_rev_interest' => '이자수익',
            'pl_cash_f_changeAssetDebtActivities' => '영업활동으로 인한 자산, 부채의 변동',
            'pl_cash_f_ar' => '매출채권',
            'pl_cash_f_inventories' => '재고자산',
            'pl_cash_f_accPayable' => '매입채무',
            'pl_cash_f_salesGeneCash' => '영업활동으로 인한 현금창출',
            'pl_cash_f_interestPayment' => '이자지급',
            'pl_cash_f_govTax' => '정부세금',
            'pl_cash_f_LocalGovTax' => '지방정부세금',
            'pl_cash_f_investmentActivityCashFlow' => '2. 투자활동 현금흐름',
            'pl_cash_f_inflowfrominvestActivity' => '투자활동으로 인한 현금유입액',
            'pl_cash_f_DisposalOfFixtures' => '비품처분손익',
            'pl_cash_f_addExpenseWithoutCash' => '투자활동으로 인한 현금유출액',
            'pl_cash_f_acquiOfEquipment' => '비품의 취득',
            'pl_cash_f_financingActi' => '3. 재무활동 현금흐름',
            'pl_cash_f_addOfExpensesWithoutCashoutflow' => '재무활동으로 인한 현금유입액',
            'pl_cash_f_IssuanceOfBonds' => '채권(사채)발행',
            'pl_cash_f_CashOutflowFinAct' => '재무활동으로 인한 현금유출액',
            'pl_cash_f_CashDiv' => '현금배당',
            'pl_cash_f_CashAndCashEquip' => '현금 및 현금성자산',
            'pl_cash_f_BaseCashAndCashEquip' => '기초 현금 및 현금성자산',
            'pl_cash_f_LastCashAndCashEquip' => '기말 현금 및 현금성자산'
        );
        
        
        $this->msg['ko-kr']['report']['changeInEquity'] = Array(
            'chE_title' => '자본변동표',
            'chE_unit' => '단위:',
            'chE_h_capital' => '자본금',
            'chE_h_retainEarning' => '이익잉여금',
            'chE_h_total' => '총계',
            'chE_l_startDate' => '시작일자',
            'chE_l_capitalNotApplicable' => '해당없음',
            'chE_l_capitalEquity' => '자기자본',
            'chE_l_capitalOther' => '타인자본',
            'chE_l_pl_NetIncomeOutcome' => '당기순이익/순손실',
            'chE_l_pl_CashDividend' => '현금배당',
            'chE_f_endDateTitle' => '종료일자',
            'chE_f_totalTitle' => '계'
            
        );
        
        
        $this->msg['ko-kr']['accType'] = Array(
            'type_income' => '수입',
            'type_outcome' => '지출',
            'type_capital' => '자본',
            'type_debt' => '부채',
            'type_asset' => '자산'
        );
        
        $this->msg['ko-kr']['accType']['accCategory'] = Array(
            
            'type_not_selected' => '선택안함',
            'type_not_applicable' => '해당없음',
            
            // 수입에 관한 항목
            // 수입 - 공통항목 - 해당없음
            'type_income_general_sales' => '일반매출',
            'type_income_interest_revenue' => '이자수익',
            'type_income_fdr' => '비품처분수익',
            'type_income_other_revenue' => '기타수익',
            
            // 지출에 관한 항목
            'type_cost_manufacturing' => '제조비용',
            'type_cost_purchase' => '매입비용',
            'type_cost_advertising' => '광고비용',
            'type_cost_shipping' => '운송비용',
            'type_cost_rent' => '임대료',
            'type_cost_salary' => '급여비용',
            'type_cost_consumable' => '소모품비용',
            'type_cost_gas' => '가스비용',
            'type_cost_electric' => '전기비용',
            'type_cost_communication' => '통신비용',
            'type_cost_consumable_insurance' => '소모성보험',
            'type_cost_inventory' => '재고비용',
            'type_cost_interest_expense' => '이자비용',
            'type_cost_depreciation' => '감가상각비(논리비)',
            'type_cost_other' => '기타비용',
            'type_cost_cash_dividend' => '현금배당',
            'type_cost_lodfixture' => '비품처분손실',
            'type_cost_govTax' => '정부세금',
            'type_cost_localGovTax' => '지방정부세금',
            
            // 자본에 관한 항목
            // 지출 - 공통항목 - 해당없음
            'type_capital_equity' => '자기자본',
            'type_captial_other' => '타인자본',
            
            // 부채에 관한 항목
            'type_debt_short_borrowing' => '단기차입금',
            'type_debt_mid_borrowing' => '중장기차입금',
            'type_debt_bond_issuance' => '채권발행',
            
            // 자산에 관한 항목
            'type_asset_land' => '토지',
            'type_asset_ar' => '매출채권',
            'type_asset_insurance' => '보험',
            'type_asset_expendables' => '소모품',
            'type_asset_machinery' => '기계장치',
            'type_asset_stock' => '재고',
            // 자산 - 공통항목 - 해당없음
            
        );
        
    }
    
    public function getMsg(){
        return $this->msg;
    }
    
}

?>