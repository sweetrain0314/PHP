# boardz
게시판 검색 기능 완성하기

## 기존 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.html
```

## 추가 및 수정된 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.php (수정)
[만약 추가한 파일이 있으면, 내용 추가! 없으면 이 문구 삭제!]
```

## board.php (수정)
[내용 추가!!]
- mysql 연결
- mysql 데이터베이스 연결
- $_POST['search']이 존재하면 sql 셀렉트문을 통해 boardz에서 타이틀이 $_POST['search']와 비슷한 데이터를 읽어온다.
- $_POST['search']가 존재하지 않으면 sql셀렉트문을 통해 boardz에 있는 레코드를 읽어온다. 
            <?php
            $connect = mysqli_connect("localhost", "sdb", "1234");
            $db_con = mysqli_select_db($connect, "sdb_db");
            if (isset($_POST['search']))
                $sql = "select * from boardz where title like '%{$_POST['search']}%';";
            else
                $sql = "select * from boardz;";
            $result = mysqli_query($connect, $sql);
            $num = mysqli_num_rows($result);
            ?>
            
