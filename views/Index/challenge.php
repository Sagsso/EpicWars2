<?php
    require_once LOGIC."/logic.php";
?>

<?php $this->loadFragment("head"); ?>
<body>

    <div class="container2 my-5">
        <div class="area-header">
            <?php $this->loadFragment("header"); ?>
        </div>
        <div class="area-content">
            <div class="py-3 px-5 grid-center card">
                <h1 class="h3 my-3 text-center font-weight-normal">Challenge</h1>
                <?php fight($one, $two);?>
                <a href="<?php echo URL ?>arena" class="mt-3 text-start">Come back</a>
            </div>
        </div>
    </div>

</body>
</html>