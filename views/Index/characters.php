<div class="container4">
    <div class="area-table container-fluid">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Characters</h6>
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
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Class: activate to sort column ascending" style="width: 130px;">Class</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Level</th>
                                        <th rowspan="1" colspan="1">Class</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                    foreach ($this->characters as $character) {
                                        // print_r($character["name"]);
                                        echo "<tr role='row' class='odd'>
                                        <td class='sorting_1'>".$character['name']."</td>
                                        <td>". $character['level']."</td>
                                        <td>".$character['class']."</td>
                                        </tr>";
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="area-btn center-start">
        <a href="<?php print(URL); ?>create" class="asyncLink btn btn-primary js-scroll-trigger">Create a new character</a>
    </div>

</div>