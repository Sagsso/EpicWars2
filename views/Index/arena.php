<?php 
require_once LOGIC."/logic.php";
$this->loadFragment("head");
if (isset($_POST['character_selected'])) {
    // $_SESSION["character_selected"] = $_POST['character_selected'];
    $_SESSION["id_character_selected"] = $_POST['character_selected'];
}
?>

<body>
    <div class="container2">
        <div class="area-header">
            <?php $this->loadFragment("header"); ?>
        </div>
        <div class="area-content">
            <form action="#" class="container5" method="POST">
                <div class="selector area-selector">
                    <h6 class="m-0 font-weight-bold card-header py-3">Seleccionar personaje</h6>
                    <div class="dropdown card-body">
                        <form action="<?php echo URL."arena"?>" method="POST" >
                            <select value="<?php echo $_SESSION['id_character_selected'] ?>" onclick="this.form.submit()" name="character_selected" id="" class="form-control">
                                <?php
                                        echo " <option value='" . $_SESSION['id_character_selected'] . "'>" . Characters_bl::getCharacter($_SESSION['id_character_selected']) . "</option>";
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
                        <div class="col-sm-12">
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
                                    if (is_array($this->rivals) || is_object($this->rivals))
                                    {
                                    foreach ($this->rivals as $rival) {
                                        echo "<tr role='row' class='odd'>
                                        <td class='sorting_1'>" . $rival['name'] . "</td>
                                        <td>" . $rival['level'] . "</td>
                                        <td>" . $rival['class'] . "</td>
                                        <td>" . $rival['username'] . "</td>
                                        <td><button href='#' type='submit'>Desafiar</button></td>
                                        </tr>
                                        ";
                                    }} ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    function send(e) {
        e.preventDefault();
        console.log('Hola');
    }
</script>

</html>