# TableBoard_Shop
게시판-Shop 의 TODO 완성하기!

## 기존 파일
```
 .
├── css - board_form.php와 index.php 에서 사용하는 stylesheet
│   └── ...
├── fonts - 폰트
│   └── ...
├── images - 아이콘 이미지
│   └── ...
├── vender - 외부 라이브러리
│   └── ...
├── js - board_form.php와 index.php 에서 사용하는 javascript
│   └── ...
├── function
│   └── insert.php - 게시글 작성 기능 구현
│   └── update.php - 게시글 수정 기능 구현
│   └── delete.php - 게시글 삭제 기능 구현
├── board_form.php - 게시글 작성/수정 시 사용하는 form이 포함된 php 파일
├── index.php - 게시글 조회 기능 구현
```

## MySQL 테이블 생성!
[여기에 테이블 생성 시, 사용한 Query 를 작성하세요.]
Note: 
- table 이름은 tableboard_shop 으로 생성
- 기본키는 num 으로, 그 외의 속성은 board_form.php 의 input 태그 name 에 표시된 속성 이름으로 생성
- 각 속성의 type 은 자유롭게 설정 (단, 입력되는 값의 타입과 일치해야 함)
    - ex) price -> int
    - ex) name -> char or varchar
    
        mysql> create table tableboard_shop (
            -> num int not null auto_increment,
            -> date char(40),
            -> order_id int,
            -> name char(40),
            -> price int,
            -> quantity int,
            -> primary key(num)
            -> );
## index.php 수정
[여기에 index.php 를 어떻게 수정했는지, 설명을 작성하세요.]
 
- MySQL datebase 연동
- db연결

- 인덱스페이지에 레코드값을 표시하기 위해 mysqli_fetch_array() 함수를 이용해서  레코드를 가져오고 
결과를 row에 저장한다.그리고 row[date], row[order_id]등등의 값을 인덱스 값에 출력하도록 한다.

- 레코드 클릭시에는 액션값으로 href를 이용하여 board_form.php?num=$row[num]으로 해당 레코드값을 가진 보드폼으로
넘어가도록 한다.


## board_form.php 수정
[여기에 board_form.php 를 어떻게 수정했는지, 설명을 작성하세요.]
- isset($_GET[num])을 통해 num값이 존재하는 경우에는 
    $sql = "select * from tableboard_shop where num = $_GET[num]";
해당 레코드를 셀렉트문을 통해 가져오도록 한다.

- isset($_GET[num])인 경우에 POST를 통해 수정할 레코드 값을 받아 num=$_GET[num]인 update.php로 전달하도록 한다.
- isseet($_GET[num])이 아닐 경우에는 POST로 받은 값을 insert.php로 전달하도록 한다. 

- 보드 화면에서 isset($_GET[num])인 경우에는 레코드의 값이 화면에 출력되도록 한다.

- isset$_GET[num]인 경우에 딜리트 버튼을 누르면 $_GET[num]값이 연결된 delete.php파일로 이동하도록 한다.

## function
### insert.php 수정
[여기에 insert.php 를 어떻게 수정했는지, 설명을 작성하세요.]
- mysql 연결
- mysql 데이터베이스 연결
- tableboard_shop에 POST를 통해 넘겨받은 값들을 넣어 새로운 레코드를 삽입한다.
- insert가 실패하면 오류 alert를 띄운다.
- insert가 성공하면 replace를 통해 index.php로 창이 대체되도록 한다. 

### update.php 수정
[여기에 update.php 를 어떻게 수정했는지, 설명을 작성하세요.]
- mysql 연결
- mysql 데이터베이스 연결
- update를 이용하여 num이 $_GET[num]인 레코드를 POST로 받아온 값으로 수정한다. 
- update 실패시 alert를 띄워 실패를 알린다.
- update 성공시 replace를 이용해 index.php로 창을 대체시킨다. 

### delete.php 수정
[여기에 delete.php 를 어떻게 수정했는지, 설명을 작성하세요.]
- mysql 연결
- mysql 데이터베이스 연결
- num값이 $_GET[num]인 레코드를 삭제한다.
- delete 실패시 alert로 실패를 알린다.
- delete 성공시 replace를 이용해 index.php로 창을 대체시킨다. 