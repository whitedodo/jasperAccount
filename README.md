## [JasperAccount with PHP - Project]

#### 작성자 소개(About the author)
> ##### 1. Dodo (rabbit.white@daum.net)
> ##### 2. Created by: 2018-08-18
> ##### 3. Description: 
> ###### 3-1. 2018-08-01 ~ 2018-08-03 / Jasper / IFRS Project 진행 (로직 등에 대해서 연구) - IFRS Project (research on logic etc.)
> ###### 3-2. 2018-08-01 ~ 2018-08-03 / Jasper / URL 짧은 주소 추가(.htaccess) / Add URL Short Address (.htaccess)
> ###### 3-3. 2018-08-01 ~ 2018-08-03 / Jasper / Apache 2.2, PHP 5.2~5.6를 지원함. / Supports Apache 2.2, PHP 5.2 to 5.6.
> ###### 3-4. 2018-08-01 ~ 2018-08-03 / Jasper / W3C Validator 검사 완료(W3C Validator Check Completed) / https://validator.w3.org/
> ##### 4. License: MIT License.

#### 빌드(Build)
> ##### 1. Apache 2, PHP 5.2 환경에 넣어서 사용하면 된다.(Can be used in Apache 2, PHP 5.2 environment.)

#### Quick Start(쉬운 시작)
> ##### 1. index.php 파일을 열어서 환경 설정을 한다. / Jasper / 2018-08-18
        (Open the index.php file to configure the environment.)
        
        - 윈도우(Windows)
        $root = "C:/{webRootDir}/htdocs";
        $directories = '{폴더명 / 없으면 생략}';
        - 리눅스(Linux)        
        $root = '/usr/{경로명}/{계정명}';
        $directories = '{폴더명 / 없으면 생략}';
        - 사용자 디렉토리( http:// {주소} /~{계정명} )
        $directories = '{폴더명 / 없으면 생략}';
        $directories = '{~계정명}';
       
> ##### 2. mysql DB에 Create Table 명령어로 jasper 테이블을 설정한다. / Jasper / 2018-08-18
        (Set the jasper table with the Create Table command in mysql DB.)
        
> ##### 3. controller/JasperAccount/JasperAccount.php의 DB 설정을 해준다. / Jasper / 2018-08-18
        (Set the DB of "controller/JasperAccount/JasperAccount.php")
        
        localhost(Hostname / 호스트명), userId(사용자계정), password(비밀번호), dbname(디비명)
        
> ##### 4. 웹 사이트에 접속한다. / Jasper / 2018-08-18
        (Access the web site.)

        http://{HostName}/book/{tableName}/{random userName}/{startDate}/{endDate}/{language}
        http://{호스트명}/book/{테이블이름}/{임의의 사용자명}/{시작일자}/{종료일자}/{언어}
        
        테이블명만 바꾸면, 다중 접속도 가능하다.(If the table name is changed, multiple connections are also available.)
