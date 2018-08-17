
/*
	2018-08-16
	Author: Jasper(rabbit.white@daum.net)
	FileName: categories.js
	Goal: Jasper의 IFRS 시스템 (IFRS system)
	Description:	
	1. 2018-08-01 / Japser / IFRS 구현
	2. 2018-08-02 / Japser / 다수 복합 기능 구현(뼈대 만들기)
	3. 2018-08-02 / Japser / reporting, write, modify 등 구현
*/

/*
	
    function changes(fr, articleID) {

      alert( isNumber( articleID ) );
      var frmName = "write";
      var myForm = "";

      if ( articleID != -1 ){
        frmName = "bookeeping_frm_" + articleID;
      }
      myForm = document.forms[frmName];
      
      if( fr == 1 ) {
        //뿌려줄값을 배열로정렬
        num = new Array("1)첫번째목록", "1)두번째목록", "1)세번째목록");
        vnum = new Array("1","2","3");
      } else if(fr==2) {
        num = new Array( "2)첫번째목록", "2)두번째목록", "2)세번째목록" );
        vnum = new Array("1","2","3");
      }
      
      // 셀렉트안의 리스트를 기본값으로 한다..
      for(i=0; i < myForm.category.length; i++) {
        myForm.category.options[0] = null;
      }
      //포문을 이용하여 두번째(test2)셀렉트 박스에 값을 뿌려줍니당)
      for(i=0;i < num.length;i++) {
        myForm.category.options[i] = new Option(num[i], vnum[i]);
      }
    
  }
*/

// 통합형 CRUD 구현
function jasper_update(boardName, language, startDate, endDate, userName, articleID, type){
  
    var frmName = "bookeeping_frm_" + articleID;
    var myForm = document.forms[frmName];
    
    var startID = 1;
    var lastID = 7;
    
    while ( startID <= lastID ){
      
      var hiddenField = document.createElement("input");
      hiddenField.setAttribute("type", "hidden");
      
      switch ( startID )
      {
        case 1:    
          hiddenField.setAttribute("name", "boardName");
          hiddenField.setAttribute("value", boardName);   
          break;
          
        case 2:
          hiddenField.setAttribute("name", "startDate");
          hiddenField.setAttribute("value", startDate);
          break;
    
        case 3:
          hiddenField.setAttribute("name", "endDate");
          hiddenField.setAttribute("value", endDate);
          break;
          
        case 4:
          hiddenField.setAttribute("name", "userName");
          hiddenField.setAttribute("value", userName);
          break;
          
        case 5:
          hiddenField.setAttribute("name", "language");
          hiddenField.setAttribute("value", language);
          break;
                      
        case 6:
          hiddenField.setAttribute("name", "articleID");
          hiddenField.setAttribute("value", articleID);
          break;
          
        case 7:
          hiddenField.setAttribute("name", "choose");
          hiddenField.setAttribute("value", type);
          break;
      }
      
      myForm.appendChild(hiddenField);
      
      startID++;
    }

    myForm.submit();

}
 
function toggleLayer(layer)
{
   //alert('야호'); 
   var frmName = "writeFrm";
   var myForm = document.getElementById(frmName);
  
//    var x = document.getElementById("myForm").elements.namedItem("fname").value;
//    document.getElementById("demo").innerHTML = x;
    
   var l = myForm.elements.namedItem(layer); 
   var display = document.getElementById(layer).style.display;
//     alert ( display.indexOf("block") );
     
   if ( !display.indexOf("none") ){
       document.getElementById(layer).style.display = "block";
//        alert('호');
   }
   else {
        document.getElementById(layer).style.display = "none";
//        alert('하');
   }
}