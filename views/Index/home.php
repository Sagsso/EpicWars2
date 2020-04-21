<?php $this->loadFragment("head"); ?>
<body>

    <div class="container2">
        <div class="area-header">
            <?php $this->loadFragment("header"); ?>
        </div>
        <div id="asyncLoadArea" class="area-content">
        </div>
    </div>

    <script type="text/javascript" src="<?php echo ASYNCHRONOUS; ?>asynchronousUX.js"></script>
    <script type="text/javascript">
    //Script para cargar la primera pagina
    fetch('<?php print(URL); ?>initial', {
        method: 'GET',
    }).then((response) => {
        response.text().then((info) => {
            $("#asyncLoadArea").html(info);
        });
    });
    </script>

</body>
</html>

