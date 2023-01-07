<h5><i class="bi bi-speedometer2 px-1"></i>Dashboard</h5>
<div class="col-sm-6 col-md-8">
    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">
        <i class="bi bi-plus px-1"></i>Add Case
    </button>
    <button type="button" id="Connect" onclick="hideme()" class="btn btn-primary enableEthereumButton mb-2 "><i class="bi bi-wallet2 px-1"></i>Connect</button>
</div>
<!--<div class="col-4">
    <input class="form-control" placeholder="Type to search...">
</div>-->
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-center">
        <thead class="table-light">
        <tr>
            <th scope="col"><i class="bi bi-list-ol px-1"></i>Case No</th>
            <th scope="col"><i class="bi bi-activity px-1"></i>Name</th>
            <th scope="col" class="d-none d-lg-table-cell"><i class="bi bi-telephone px-1"></i>Contact No</th>
            <th scope="col" class="d-none d-lg-table-cell"><i class="bi bi-calendar px-1"></i>Date</th>
            <th scope="col"><i class="bi bi-gear px-1"></i>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($Cases as $value => $case){ ?>
        <tr>
            <th scope="row"><?php echo $case->ID; ?></th>
            <td><?php echo $case->Name; ?></td>
            <td class="d-none d-lg-table-cell"><?php echo $case->Contact; ?></td>
            <td class="d-none d-lg-table-cell"><?php echo $case->Date; ?></td>
            <th>
                <a class="btn btn-success btn-sm" href="/view/<?php echo $case->ID; ?>" role="button"><i class="bi bi-eye"></i></a>
                <a class="btn btn-danger btn-sm" href="#" role="button"><i class="bi bi-box"></i></a>
            </th>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Case</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"><i class="bi bi-activity px-1"></i>Name:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"><i class="bi bi-telephone px-1"></i>Contact No:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"><i class="bi bi-clipboard2-pulse-fill px-1"></i>Patient Status:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"><i class="bi bi-capsule px-1"></i>Drugs:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"><i class="bi bi-lungs px-1"></i>Lab Test:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"><i class="bi bi-camera px-1"></i>Radiology:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" name="save" class="btn btn-primary">Save Data</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

