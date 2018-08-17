<?php
/*
	2018-08-01
	Author: Jasper(rabbit.white@daum.net)
	FileName: function.php
	Goal: Jasper의 IFRS 시스템 (IFRS system)
	Description:	
	1. 2018-08-01 / Japser / IFRS 1 구현
	2. 2018-08-02 / Japser / function calculate($id, $money1, $money2) / 타입, 이전값, 신규값
                  (타입 별 규격화: 예 money = money1 + money2 등)
	3. 2018-08-02 / Japser / function sizeType($type) / type 1, 2(최소, 최대)
	4. 2018-08-02 / Japser / function sizeCategory($type, $id) / type 1, 2(최소, 최대)
	5. 2018-08-02 / Japser / function getType( $id ) / 
	                (type 내용 - 규격화 : 1, 수입, 지출, 자본, 부채, 자산)
	6. 2018-08-02 / Japser / function getCategory( $id ) / 
	                (category 내용 - 세부내용 탑재)
	                
	7. 2018-08-02 / Japser / function getSearchCategoryID($type, $keyword) 
	8. 2018-08-17 / Jasper / 다국어 기능 추가
	9. 2018-08-17 / Jasper / private $url 제거 및 기능 이전(AccountFn->JasperFunction으로 통합)
*/

class AccountFn{
  
  private $language;
    
  private $minSizeType;
  private $maxSizeType;
  
  private $minSizeACategory;     // 수입(Income) - 최소
  private $maxSizeACategory;     // 수입(Income) - 최대
  private $minSizeBCategory;     // 지출(Outcome) - 최소
  private $maxSizeBCategory;     // 지출(Outcome) - 최대
  private $minSizeCCategory;     // 자본(Capital) - 최소
  private $maxSizeCCategory;     // 자본(Capital) - 최대
  private $minSizeDCategory;     // 부채(Debt) - 최소
  private $maxSizeDCategory;     // 부채(Debt) - 최대
  private $minSizeECategory;     // 자산(Asset) - 최소
  private $maxSizeECategory;     // 자산(Asset) - 최대
  
  public function __construct( $language ){
    
    $this->language = $language;
    
    $this->minSizeType = 1;   // 타입 크기
    $this->maxSizeType = 5;
    
    $this->minSizeACategory = 1; // 수입(Income) 크기
    $this->maxSizeACategory = 5; 
    $this->minSizeBCategory = 1; // 지출(Outcome) 크기
    $this->maxSizeBCategory = 19; 
    $this->minSizeCCategory = 1; // 자본(Capital) 크기
    $this->maxSizeCCategory = 3; 
    $this->minSizeDCategory = 1; // 부채(Debt) 크기
    $this->maxSizeDCategory = 3; 
    $this->minSizeECategory = 1; // 자산(Asset) 크기
    $this->maxSizeECategory = 7; 
  }
  
  // URL 주소
  public function getUrl(){
      return $this->url;
  }
  
  // 언어 설정
  public function setLanguage($language){
      $this->language = $language;
  }
  
  // 타입 크기(Min = 1, Max = 2);
  public function sizeType($type){
    
    // Min 크기 가져오기
    if ( $type == 1 ){
      return $this->minSizeType;
    }
    // Max 크기 가져오기
    else if ( $type == 2 ){
      return $this->maxSizeType;
    }
    
  }
  
  //  카테고리 크기(Min = 1, Max = 2);
  public function sizeCategory($type, $id){
    
    // Min 크기 가져오기
    if ( $type == 1 ){
      
      switch ( $id ){
        
        // 수입(Income)
        case 1:
          return $this->minSizeACategory;
          break;
          
        // 지출(Outcome)
        case 2:
          return $this->minSizeBCategory;        
          break;
        
        // 자본(Capital)
        case 3:
          return $this->minSizeCCategory;
          break;
        
        // 부채(Debt)
        case 4:
          return $this->minSizeDCategory;
          break;
          
        // 자산(Asset)
        case 5:
          return $this->minSizeECategory;
          break;
      }
    }
    // Max 크기 가져오기
    else if ( $type == 2 ){
      switch ( $id ){
        
        // 수입(Income)
        case 1:
          return $this->maxSizeACategory;
          break;
          
        // 지출(Outcome)
        case 2:
          return $this->maxSizeBCategory;        
          break;
        
        // 자본(Capital)
        case 3:
          return $this->maxSizeCCategory;
          break;
        
        // 부채(Debt)
        case 4:
          return $this->maxSizeDCategory;
          break;
          
        // 자산(Asset)
        case 5:
          return $this->maxSizeECategory;
          break;
      }
    }
    
  }
  
  // 타입 가져오기
  public function getType( $id ){
    
    $language = $this->language;
    $languagePack = new Language($language);
    
    switch ( $id ){
      
      case 1:
        return $languagePack->getMessage('accType', null, 'type_income');
        break;
        
      case 2:
        return $languagePack->getMessage('accType', null, 'type_outcome');
        break;
        
      case 3:
        return $languagePack->getMessage('accType', null, 'type_capital');
        break;
        
      case 4:
        return $languagePack->getMessage('accType', null, 'type_debt');
        break;
        
      case 5:
        return $languagePack->getMessage('accType', null, 'type_asset');
        break;
    }
  }
  
  public function calculate( $id, $money1, $money2 ){
    
    $sum = 0;
    
    switch ( $id ) {
      
      // 수입(income)
      case 1:
        $sum = $money1 + $money2;
        break;
      
      // 지출(outcome)
      case 2:
        $sum = $money1 - $money2;
        break;
      
      // 자본(Capital)
      case 3:
        $sum = $money1 + $money2;
        break;
        
      // 부채(Dept)
      case 4:
        $sum = $money1 + $money2;
        break;
        
      // 자산(Asset)
      case 5:
        $sum = $money1 - $money2;
        break;
      
    }
    
//    echo $money1 . "-" . $money2 . "<br>";
    
    return $sum;
     
  }
  
  public function createType()
  {
    
    echo "\t\t<select name=\"type\">\n";
    
    $index = $this->sizeType(1);
    $max = $this->sizeType(2);
    
    while ( $index <= $max ){
    
      echo "\t\t\t<option value=\"$index\">";
      echo $this->getType( $index );
      echo "</option>\n";
      $index++;
    }

    echo "\t\t</select>\n";
  }
  
  public function getCategory($groupid, $id){
      
    $language = $this->language;
    $languagePack = new Language($language);
      
    switch ( $groupid ){
    
      // 수입
      case 1:
        switch ( $id ){
            
         case 1:
             return $languagePack->getMessage('accType', 'accCategory', 'type_not_applicable');
             break;
              
         case 2:
             return $languagePack->getMessage('accType', 'accCategory', 'type_income_general_sales');
             break;

         case 3:
             return $languagePack->getMessage('accType', 'accCategory', 'type_income_interest_revenue');
             break;
          
         case 4:
             return $languagePack->getMessage('accType', 'accCategory', 'type_income_fdr');
             break;
                   
         case 5:
             return $languagePack->getMessage('accType', 'accCategory', 'type_income_other_revenue');
             break;
        }
        break;
      
      // 지출  
      case 2:
      
       switch( $id ){
           
          case 1:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_manufacturing');
            break;
            
          case 2:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_purchase');
            break;
            
          case 3:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_advertising');
            break;
            
          case 4:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_shipping');
            break;      
            
          case 5:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_salary');
            break;

          case 6:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_consumable');
            break;
            
          case 7:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_gas');
            break; 
            
          case 8:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_electric');
            break;
            
          case 9:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_communication');
            break; 
              
          case 10:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_consumable_insurance');
            break;
            
          case 11:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_interest_expense');
            break;
                        
          case 12:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_depreciation');
            break;
            
          case 13:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_inventory');
            break;
            
          case 14:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_rent');
            break;
            
          case 15:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_other');
            break;
            
          case 16:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_cash_dividend');
            break;
            
          case 17:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_lodfixture');
            break;
                        
          case 18:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_govTax');
            break;
            
          case 19:
            return $languagePack->getMessage('accType', 'accCategory', 'type_cost_localGovTax');
            break;
        }
      
        break;
        
      // 자본
      case 3:
      
        switch ( $id ){
         case 1:
            return $languagePack->getMessage('accType', 'accCategory', 'type_not_applicable');
            break;
        
         case 2:
            return $languagePack->getMessage('accType', 'accCategory', 'type_captial_other');
            break;
          
         case 3:
            return $languagePack->getMessage('accType', 'accCategory', 'type_capital_equity');
            break;
        }
        
        break;
        
      // 부채
      case 4:
        
        switch ( $id ){    
          
            case 1:
                return $languagePack->getMessage('accType', 'accCategory', 'type_debt_short_borrowing');
                break;
            
           case 2:
               return $languagePack->getMessage('accType', 'accCategory', 'type_debt_mid_borrowing');
               break;
            
           case 3:
               return $languagePack->getMessage('accType', 'accCategory', 'type_debt_bond_issuance');
               break;
        }
        
        break;
        
      // 자산
      case 5:
        switch ( $id ){ 
          
         case 1:
            return $languagePack->getMessage('accType', 'accCategory', 'type_asset_land');
            break;
          
         case 2:
            return $languagePack->getMessage('accType', 'accCategory', 'type_asset_ar');
            break;
          
         case 3:
            return $languagePack->getMessage('accType', 'accCategory', 'type_asset_insurance');
            break;
          
         case 4:
            return $languagePack->getMessage('accType', 'accCategory', 'type_asset_expendables');
            break;
          
         case 5:
            return $languagePack->getMessage('accType', 'accCategory', 'type_asset_machinery');
            break;
          
         case 6:
            return $languagePack->getMessage('accType', 'accCategory', 'type_asset_stock');
            break;
             
         case 7:
            return $languagePack->getMessage('accType', 'accCategory', 'type_not_applicable');
            break;
        }
              
        break;

    }
  }
  
    // 타입, 카테고리
    public function createMenu($type, $id)
    {
        
        $language = $this->language;
        $languagePack = new Language($language);
        
        // 유형(구분)
        if ( strcmp ($type, 'type') == 0 ){
            
          $index = $this->sizeType(1);
          $max = $this->sizeType(2);
         
            // id의 Null 여부
            if ( $id != NULL )
            {
                echo "\t\t<select name=\"type_";
                echo $id . "\" style=\"width:85%;\" onchange=\"changes(this.form";
                echo ".type_" . $id . ".value, $id)\">\n";
            }
            else
            {
                echo "\t\t<select name=\"type\" style=\"width:85%;\" onchange=\"changes(this.form.type.value, 'write')\">\n";
            }
              
            while ( $index <= $max ){
              
                echo "\t\t\t<option value=\"$index\">";
                echo $this->getType( $index );
                echo "</option>\n";
                $index++;
            }
            echo "\t\t</select>\n";
        }
        // 유형(카테고리)
        else if ( strcmp ( $type, 'category' ) == 0 )
        { 
            echo "\t\t<select name=\"";
            echo "category\" style=\"width:85%;\">\n";        
        
            echo "<option>";
            echo $languagePack->getMessage('accType', 'accCategory', 'type_not_selected');
            echo "</option>";
            echo "\t\t</select>\n";
          
        }
    }
  
    // 입력
    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
  
    public function selectCategory(){
   
        echo "<script>\n\n";
        echo "\t\t";
        echo "function changes(fr, articleID) {";
        echo "\n";
        echo "\t\t\t";
    //    echo "alert( isNumber( articleID ) );";
        echo "\n";
        echo "\t\t\t";
        echo "var frmName = \"write\";\n";
        echo "\t\t\t";
        echo "var myForm = \"\";";
        echo "\n";
        echo "\t\t\t";
        echo "if ( articleID != -1 ){ \n";
        echo "\t\t\t\tfrmName = \"bookeeping_frm_\" + articleID;";
        echo "\n";
        echo "\t\t\t";
        echo "}";
        echo "\n";
        echo "\t\t\t";
        echo "myForm = document.forms[frmName]; ";
        
        /// 항목 배열로 변환
        // 1. 동적배열 생성하기
        $group_id = 1;                    // 그룹 ID (수입, 지출, 자본, 부채, 자산)
        $i = $this->sizeCategory(1, 1);   // 수입(최소);
        $max = $this->sizeCategory(2, 1); // 수입(최대)
        
        echo "\n";
        echo "\t\t\t";
        echo "if( fr == 1 ) {\n";
        
        $strNum = "";
        $strVNum = "";
        
        while ($i <= $max ){
        
            if ( $i == 1 ){
                $strNum = "\"";
                $strNum = $strNum . $this->getCategory($group_id, $i) . "\"";
                $strVNum = "\"";
                $strVNum = $strVNum . $i . "\"";
            }
            else{
                $strNum = $strNum . ", \"" . $this->getCategory($group_id, $i) . "\""; 
                $strVNum = $strVNum . ", \"" . $i . "\""; 
            }
            
            $i++;
        }
        
        echo "\t\t\t\t";
        echo "num = new Array(" . $strNum . ");";
        echo "\n";
        echo "\t\t\t\t";
        echo "vnum = new Array(" . $strVNum . ");";
        echo "\n";
            
        echo "\t\t\t";
        echo "}";
        echo "\n"; 
        
        /// 나머지 데이터 출력
        $type_id = $this->sizeType(1);                    // 타입 최소값
        $type_max = $this->sizeType(2);                   // 타입 최대값
        
        // 1이 아닐 때    
        if ( $type_max != $type_id ){
        
          while ( $type_id <= $type_max ){
            
            $i = $this->sizeCategory(1, $type_id);   // 항목(최소);
            $max = $this->sizeCategory(2, $type_id); // 항목(최대)
            
            $strNum = "";
            $strVNum = "";
            
            echo "\t\t\t";
            echo "else if( fr == " . $type_id .  ") {";
            echo "\n";
            
            while ( $i <= $max ){
        
                if ( $i == 1 ){
                    $strNum = "\"" . $this->getCategory($type_id, $i) . "\"";
                    $strVNum = "\"" . $i . "\"";
                }
                else{
                    $strNum = $strNum . ", \"" . $this->getCategory($type_id, $i) . "\""; 
                    $strVNum = $strVNum . ", \"" . $i . "\""; 
                }
                
                $i++;
            }
            
            echo "\t\t\t\t";
            echo "num = new Array(" . $strNum . ");";
            echo "\n";
            echo "\t\t\t\t";
            echo "vnum = new Array(" . $strVNum . ");";
            echo "\n";
            
            echo "\t\t\t";
            echo "}";
            echo "\n";
            
            $type_id++;
          } // end of while
          
        }
        
        echo "\n";
        echo "\n";
        
        /// 셀렉트 초기화
        echo "\t\t\t";
        echo "// select(셀렉트) 안의 리스트를 기본값으로 지정\n\n";
        echo "\t\t\t";
        echo "for(i=0; i < myForm.category.length; i++) {";
        echo "\n";
        echo "\t\t\t\t";
        echo "myForm.category.options[i] = null;";
        echo "\n";
        echo "\t\t\t\t";
        echo "}";
        echo "\n";
        echo "\t\t\t";
        echo "myForm.category.length = 0;";
        echo "\n";
        echo "\t\t\t";
        echo "for(i = 0; i < num.length; i++) {";
        echo "\n";
        echo "\t\t\t\t";
        echo "myForm.category.options[i] = new Option(num[i], vnum[i]);";
        echo "\n";
        echo "\t\t\t\n";
        echo "\t\t\t";
        echo "}\n";
        echo "\t";
        echo "}\n";
        echo "\t</script>\n";
    
    } 

    public function getSearchTypeID($keyword){
    
        $id = $this->sizeType(1);        // 항목(최소)
        $max = $this->sizeType(2);       // 항목(최대)
    
        while ( $id <= $max ){
          
            // keyword 찾기
            $strTxt = $this->getType($id);
          
    //      echo $strTxt . "-" . $keyword . "<br>";
            if ( strcmp ( $strTxt, $keyword ) == 0 )
            {
                return $id;
                break; 
            }
          
            $id++;
        }
    
        return false;
    
    }

    public function getSearchCategoryID($type, $keyword){
    
        $id = $this->sizeCategory(1, $type);        // 항목(최소)
        $max = $this->sizeCategory(2, $type);       // 항목(최대)
        
        while ( $id <= $max ){
      
          // keyword 찾기
            $strTxt = $this->getCategory($type, $id);
            
            // echo $strTxt . "-" . $keyword . "<br>";
            if ( strcmp ( $strTxt, $keyword ) == 0 )
            {
                return $id;
                break; 
            }
      
            // echo $id;
            $id++;
        }
    
        return false;
    }

}

?>