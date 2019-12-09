<html>

<body>

    <div>
        <table>
            <thead>
                <tr>
                    <th>name</th>
                    <th>email</th>
                    <th>send message</th>
                </tr>
            </thead>
            <tbody>
                <?php 
               session_start();
               
                foreach ($_SESSION['users'] as $value) {
                    ?>
                    <tr>
                        <td><?= $value['name'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td>
                            <a href="../Messages/create.php?id=<?= $value['id'] ?>">Send</a>
                        </td>
                        <td></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>