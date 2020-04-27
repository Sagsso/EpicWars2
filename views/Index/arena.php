<?php 
$this->loadFragment("head");
    if (isset($_POST['character_selected'])) {
        $_SESSION["id_character_selected"] = $_POST['character_selected'];
        header('Location: ' . URL . "arena"); 
    }
    if (isset($_POST['rival_selected'])) {
        $_SESSION["id_rival_selected"] = $_POST['rival_selected'];
        header('Location: ' . URL . "challenge"); 
    }
?>

<body>
    <div class="container2">
        <div class="area-header">
            <?php $this->loadFragment("header"); ?>
        </div>
        <div class="area-content container5">
            <div class="selector area-selector">
                <h6 class="m-0 font-weight-bold card-header py-3">Seleccionar personaje</h6>
                <div class="dropdown card-body">
                    <form action="" method="POST">
                        <select value="<?php echo $_SESSION['id_character_selected'] ?>" onchange="this.form.submit()" name="character_selected" id="" class="form-control">
                            <?php
                            echo " <option value='" . $_SESSION['id_character_selected'] . "'>" . Characters_bl::getCharacterName($_SESSION['id_character_selected']) . "</option>";
                            foreach ($this->characters as $character) {
                                if ($character['idCharacter'] != $_SESSION['id_character_selected']) {
                                    echo " <option value='" . $character['idCharacter'] . "'>" . $character['name'] . "</option>";
                                }
                            } ?>
                        </select>
                    </form>
                </div>
            </div>
            <div class="area-table container-fluid">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Arena</h6>
                </div>
                <div class="row">
                    <form action="" class="col-sm-12" method="POST">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 130px;">Character</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Level: activate to sort column ascending" style="width: 100px;">Level</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Class: activate to sort column ascending" style="width: 100px;">Class</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Class: activate to sort column ascending" style="width: 150px;">Player</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Class: activate to sort column ascending" style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Character</th>
                                    <th rowspan="1" colspan="1">Level</th>
                                    <th rowspan="1" colspan="1">Class</th>
                                    <th rowspan="1" colspan="1">Player</th>
                                    <th rowspan="1" colspan="1">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if ($this->rivals) {
                                    if (is_array($this->rivals) || is_object($this->rivals)) {
                                        foreach ($this->rivals as $rival) {
                                            echo "<tr role='row' class='odd'>
                                            <td class='sorting_1'>" . $rival['name'] . "</td>
                                            <td>" . $rival['level'] . "</td>
                                            <td>" . $rival['class'] . "</td>
                                            <td>" . $rival['username'] . "</td>
                                            <td><button value='" . $rival['idCharacter'] . "' name='rival_selected' type='submit'>Desafiar</button></td>
                                            </tr>
                                            ";
                                        }
                                    }
                                } ?>

                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>