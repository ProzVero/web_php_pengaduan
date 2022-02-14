<!--CONTACT SECTION START-->

<section id="contact" >

<div class="container">

<div class="row text-center header animate-in" data-anim-type="fade-in-up">

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">



<h3>Menu Utama </h3>

<hr />



</div>

</div>



<div class="row animate-in" data-anim-type="fade-in-up">

<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

<div class="well well-sm col-md-12">

      <div class="table-responsive">

            <div class="row">

                <div class="col-lg-12">

                    <div class="panel panel-default">
mysql_
                        <div class="panel-heamysql_

                          Informasi

                        </div>

                        <!-- /.panel-heading -->

                        <div class="panel-body">

                            <div class="dataTable_wrapper">

                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                    <thead>

                                        <tr class="info">

                                            <th>Judul</th>

                                            <th>Keterangan</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                    <?php

                                    include "koneksi.php";



                                    $no=$_GET['no'];

                                    $query=mysql_query("select * from himbauan");

                                    while($d=mysql_fetch_array($query))

                                        {



                                    ?>

                                        <tr>

                                            <td><?php echo $d['judul']; ?></td>

                                            <td>

                                              <p class="text-muted" align="right">On :<?php echo $d['datetime']; ?></p>

                                              <?php echo $d['ket']; ?>

                                            </td>

                                        </tr>

                                    <?php

                                        }

                                    ?>

                                    </tbody>

                                </table>

                            </div>

                            <!-- /.table-responsive -->

                            

                        </div>

                        <!-- /.panel-body -->

                    </div>

                    <!-- /.panel -->

                </div>

                <!-- /.col-lg-12 -->

            </div>

            <!-- /.row -->

            </div>   

    </div>



</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

	<!-- form-search -->

    <div class="col-md-12">

      <form class="navbar-form navbar-left" role="search">

        <div class="input-group">

        <span class="input-group-addon" id="sizing-addon2">

          <span class="glyphicon glyphicon-search"></span>

          </span>

        <input type="text" class="form-control" placeholder="Search..." aria-describedby="sizing-addon2">

        </div>

      </form> 

    </div>

    <!-- form-search --> 

</div>



</div>





</div>

</section>

<!--CONTACT SECTION END-->