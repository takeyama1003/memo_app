<footer>
 <p>&copy; creative. 2023.</p> 
</footer>

</div>

<script>
    function logoutBtnClick(){
        const v = confirm('ログアウトしますか？');
        if(v === true){
            document.location = 'login-input.php';
        }else{
            return false;
        }
    }
</script>

</body>
</html>
