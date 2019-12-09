<?php
session_start();

if ($_SESSION['loggedIn']) { } else {
    header('Location:../Auth/login.php');
}
?>

<html>
    <style>
    body{
  font-family: 'Comfortaa', cursive;
}

h1 {
  text-align: center;
  letter-spacing: 2px;
  font-weight: 300;
  font-size:40px;
  margin-top: 80px;
}

h2{
  text-align:center;
  font-size:25px;
  font-weight: 100;
  margin-top: 20px;
}

h3{
  text-align:center;
  margin-top: 30px;
  font-size: 30px;
}

section{
  width: 500px;
  margin:50px auto;
  p{
    font-size:20px;
    font-weight: bold;
    margin-bottom: 15px;
  }
}

table{
  width:100%;
  margin: auto;
  tr{
    width: 100%;
  }
  th,td{
    box-sizing:border-box;
    padding: 15px;
  }
  thead{
    th{
      background: #000;
      color: #fff;
      text-align: left;
    }
  }

  tbody{
    text-align: left;
    th{
      background: #eee;
    }
  }
}

.sp{
  width: 420px;
  margin-top: 40px;
  tr{
      display: block;
      width: 100%;
    }
     thead{
      display: none;
    }
    tbody{
    display: block;
    width: 100%;
    overflow: hidden;
      th{
        list-style:none;
      }
      td{
        margin-left: 40px;
      }
      th,td{
        width: 100%;
        display: list-item;
      }
    }
}

@media only screen and (max-width:420px){
  body{
    width: 100%;
  }
  section{
    box-sizing:border-box;
    width: 100%;
    padding: 0px 20px;
  }
  table{
    tr{
      display: block;
      width: 100%;
    }
     thead{
      display: none;
    }
    tbody{
    display: block;
    width: 100%;
    overflow: hidden;
      th{
        list-style:none;
      }
      td{
        margin-left: 40px;
      }
      th,td{
        width: 100%;
        display: list-item;
      }
    }
  }
}
    </style>
<table>
    <thead>
        <tr>
            <th>from</th>
            <th>message</th>
            <th>date</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Reply</th>

        </tr>
    </thead>

    <tbody>
        
        <?php foreach ($_SESSION['messages'] as $value) { ?>

            <tr>
                <td><?= $value['name'] ?></td>
                <td><?= $value['message'] ?></td>
                <td><?= $value['updated_at'] ?></td>
                <td><a href="./update.php?id=<?=$value['m_id']?> & message=<?=$value['message']?>">Edit</a></td>
                <td><form action="../../Controller/MessagesController.php" method="POST">
                    <input type="hidden" name="id" value="<?=$value['m_id']?>">
                    <input type="submit" name="delete" value="Delete">
                </form></td>
                <td><a href="./reply.php?id=<?=$value['m_id']?> & message=<?=$value['message']?>">Reply</a></td>
            </tr>
        <?php } ?>

    </tbody>


</table>


</html>