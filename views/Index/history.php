<?php $this->loadFragment("head"); ?>
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
                                <div class="col-sm-12">
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
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">Aurelion</td>
                                                <td>Garet</td>
                                                <td>Victory</td>
                                                <td><a href="#">Ver</a></td>
                                            </tr><tr role="row" class="odd">
                                                <td class="sorting_1">Aurelion</td>
                                                <td>Ashe</td>
                                                <td>Defeat</td>
                                                <td><a href="#">Ver</a></td>
                                            </tr><tr role="row" class="odd">
                                                <td class="sorting_1">Ashe</td>
                                                <td>Garet</td>
                                                <td>Defeat</td>
                                                <td><a href="#">Ver</a></td>
                                            </tr><tr role="row" class="odd">
                                                <td class="sorting_1">Ashe</td>
                                                <td>Ivern</td>
                                                <td>Victory</td>
                                                <td><a href="#">Ver</a></td>
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
