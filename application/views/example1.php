<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <!-- Head -->

    <!-- End Head -->
</head>

<body>

    <main class="u-main" role="main">
        <div class="u-content">
            <div class="u-body">
                <form method="post" action='<?= base_url();?>'>'
                    <table>
                        <tr>
                            <td>Email:</td>
                            <td><input type='text' name='Email'></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type='text' name='Password'></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </main>
</body>

</html>