<?php

/********************* Include Common Header ********************/
include('inc/header.inc.php');
/********************* Include Common Menu ********************/
include('inc/menu.inc.php');

?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class='col-md-12 alert d-none' id="msgDiv"></div>
            <div class="col-lg-12">

                <section class="panel panel-primary">

                    <header class="panel-heading">
                        <strong>Notes List</strong>
                    </header>
                    <div class="panel-body">

                        <div class="adv-table">
                            <table class="table table-striped table-advance table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Note</th>
                                        <th>Attachments</th>

                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<?php
/********************* Include Common Footer ********************/
include('inc/footer.inc.php');
?>
<script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
<script src="api-js/notes-list-api.js"></script>