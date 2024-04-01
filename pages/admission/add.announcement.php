<?php
        session_start();
        include '../../includes/head.php';
        include '../../includes/session.php';
        ?>
        <title>
            Add Announcement | SFAC - Bacoor
        </title>
        </head>

        <body class="g-sidenav-show  bg-gray-100">
            <?php include '../../includes/sidebar.php'; ?>
            <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
                <!-- Navbar -->
                <?php include '../../includes/navbar-title.php'; ?>
                <h6 class="font-weight-bolder mb-0">Add Announcement</h6>
                <?php include '../../includes/navbar.php'; ?>
                <!-- End Navbar -->

                <div class="container-fluid py-4">
                    <div class="row mb-10">
                        <div class="col-lg-9 col-12 mx-auto">
                            <div class="card card-body mt-4 shadow-sm">
                                <h5 class="mb-0">Add Announcement</h5>
                                <p class="text-sm mb-0">News Details</p>
                                <hr class="horizontal dark my-3">
                                <form method="POST" action="userData/ctrl.add.announcement.php">


                                    <div class="row">
                                        <div class="col-sm-8">
                                            <label>Announcement Title</label>
                                            <input class="form-control" type="text" placeholder="Title" required
                                                name="title" />
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Date</label>
                                            <input class="form-control" type="date" placeholder="Date" required
                                                name="date" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="mt-3">Facebook Link</label>
                                            <input class="form-control" type="text" placeholder="Link" required
                                                name="link" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="mt-3">Facebook Embed</label>
                                            <input class="form-control" type="text" placeholder="Embed" required
                                                name="embed" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" value="1" name="prio">
                                                <label>Pin announcement</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end mt-4">
                                        <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit"
                                            title="Send" name="submit">Add
                                            Announcement</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php include '../../includes/footer.php'; ?>
                    <!-- End footer -->
                </div>
            </main>
            <!--   Core JS Files   -->
            <?php include '../../includes/scripts.php'; ?>
        </body>

        </html>