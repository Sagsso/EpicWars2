<?php
require_once DATABASE . "loadArena.php";
?>

<?php $this->loadFragment("head"); ?>
<body>
    <div class="container2">
        <div class="area-header">
            <?php $this->loadFragment("header"); ?>
        </div>
        <div class="area-content">
            <div class="container5">
                <div class="selector area-selector">
                    <h6 class="m-0 font-weight-bold card-header py-3">Seleccionar personaje</h6>
                    <div class="dropdown card-body">
                        <select name="class" id="" class="form-control">
                            <option value="Mage">Mage</option>
                            <option value="Rogue">Rogue</option>
                            <option value="Warrior">Warrior</option>
                        </select>
                    </div>
                </div>
                <div class="area-table container-fluid">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">Arena</h6>
                    </div>
                    <div class="card-body">
                        <div>
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="dataTable_length">
                                        </div>
                                    </div>
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
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">Garet</td>
                                                    <td>2</td>
                                                    <td>Warrior</td>
                                                    <td>SantGalvez</td>
                                                    <td><a href="#">Desafiar</a></td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="sorting_1">Aurelion</td>
                                                    <td>1</td>
                                                    <td>Mage</td>
                                                    <td>ValVega</td>
                                                    <td><a href="#">Desafiar</a></td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">Ashe</td>
                                                    <td>3</td>
                                                    <td>Rogue</td>
                                                    <td>Elperro</td>
                                                    <td><a href="#">Desafiar</a></td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="sorting_1">Ivern</td>
                                                    <td>4</td>
                                                    <td>Mage</td>
                                                    <td>MiOso</td>
                                                    <td><a href="#">Desafiar</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
