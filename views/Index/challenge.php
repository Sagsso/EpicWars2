<?php
    require_once MODELS."Game.php";
    require_once FACTORIES."CharacterFactory.php";
    require_once BUSINESS."History_bl.php";
    $this->loadFragment("head");
    $characterFactory = new CharacterFactory();

    $character1 = $characterFactory->getCharacter($_SESSION['id_character_selected']);
    $character2 = $characterFactory->getCharacter($_SESSION['id_rival_selected']);
    $game = new Game($character1,$character2);
?>
<body>

    <div class="container2 my-5">
        <div class="area-header">
            <?php $this->loadFragment("header"); ?>
        </div>
        <div class="area-content">
            <div class="py-3 px-5 grid-center card">
                <h1 class="h3 my-3 text-center font-weight-normal">Challenge</h1>
                <?php 
                $game->fight();
                $history_bl = new History_bl();
                $history_bl->create($game->getHistory());
                ?>
                <a href="<?php echo URL ?>arena" class="mt-3 text-start">Come back</a>
            </div>
        </div>
    </div>

</body>
</html>