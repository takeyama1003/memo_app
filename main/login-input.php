<?php session_start(); ?>
<?php unset($_SESSION['customer']); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<section class="login-input">
    <form action="index.php" method="post">
        <dl>
            <dt>ID</dt>
            <dd><input type="text" name="login"></dd>
            <dt>パスワード</dt>
            <dd><input type="password" name="password"></dd>
            <dd><a href="customer-input.php">アカウント作成</a><input type="submit" value="ログイン"></dd>
        </dl>
    </form>
</section>

<?php require '../footer.php'; ?>
