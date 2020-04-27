<?php 
$this->loadFragment("head");
if (isset($_POST['detail_selected'])) {
    $_SESSION["detail_selected"] = $_POST['detail_selected'];
    header('Location: ' . URL . "challengeH"); 
}
?>
<body>

    <div class="container2">
        <div class="area-header">
            <?php $this->loadFragment("header"); ?>
        </div>
        <div class="area-content">
            <div class="container4">
                <div class="area-table container-fluid">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">Historial</h6>
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
                                <form action="" class="col-sm-12" method="POST">
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 130px;">Challenger</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Level: activate to sort column ascending" style="width: 100px;">Challenged</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Class: activate to sort column ascending" style="width: 100px;">Results</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Class: activate to sort column ascending" style="width: 150px;">Details</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th rowspan="1" colspan="1">Challenger</th>
                                            <th rowspan="1" colspan="1">Challenged</th>
                                            <th rowspan="1" colspan="1">Result</th>
                                            <th rowspan="1" colspan="1">Details</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            if ($this->history) {
                                                if (is_array($this->history) || is_object($this->history)) {
                                                    foreach ($this->history as $his) {
                                                        echo "<tr role='row' class='odd'>
                                                        <td class='sorting_1'>" . Characters_bl::getCharacterName($his['challengerId']) . "</td>
                                                        <td>" . Characters_bl::getCharacterName($his['challengedId']) . "</td>
                                                        <td>" . (($his['result']) ? 'Victory' : 'Defeat') . "</td>
                                                        <td><button value='" . $his['detail'] . "' name='detail_selected' type='submit'>Ver</button></td>
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
                </div>
            </div>
        </div>
    </div>

</body>
</html>
