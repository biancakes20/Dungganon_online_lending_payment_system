<?php

include('../../Classes/Connection.php');
include('../../Classes/Client.php'); 
session_start();


if (!isset($_SESSION['id']) || $_SESSION['id'] != 1) {
    header("Location: ../../pages/home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dunnganon - Admin Portal</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background-color: #2c3e50; color: #ecf0f1; }
.sidebar { background-color: #1f2a38; min-height: 100vh; padding-top: 20px; }
.nav-link { color: #ecf0f1; padding: 10px 15px; }
.nav-link:hover, .nav-link.active { background-color: #34495e; color: #3498db; border-left: 3px solid #3498db; }
.card { background-color: #2c3e50; border: 1px solid #34495e; color: #ecf0f1; }
.table { --bs-table-bg: #2c3e50; --bs-table-color: #ecf0f1; }
.table > :not(caption) > * > * { background-color: var(--bs-table-bg); border-bottom-color: #34495e; }
.badge-success { background-color: #2ecc71; color: #1f2a38; }
.badge-danger { background-color: #e74c3c; color: #fff; }
.badge-warning { background-color: #f39c12; color: #fff; }
</style>
<script src="../../assets/js/jquery.js"></script>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-2 sidebar p-0">
            <h4 class="text-center py-3 border-bottom text-primary">Dungganon Admin</h4>
            <div class="list-group list-group-flush">
                <a href="#" class="nav-link active">🏠 Dashboard</a>
            </div>
        </div>

        
        <div class="col-md-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-primary">Borrower Management</h2>
                <a href="../../pages/logout.php" class="btn btn-outline-light">Logout</a>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-3">
                        <h4 class="card-title mb-3">Payments List</h4>
                        <div class="table-responsive" id="paymentsTable">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editPaymentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title">Edit Payment</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editPaymentForm">
          <input type="hidden" id="edit_t_id">
          <div class="mb-2">
            <label>Name</label>
            <input type="text" id="edit_name" class="form-control">
          </div>
          <div class="mb-2">
            <label>Address</label>
            <input type="text" id="edit_address" class="form-control">
          </div>
          <div class="mb-2">
            <label>Contact</label>
            <input type="text" id="edit_contact" class="form-control">
          </div>
          <div class="mb-2">
            <label>Amount</label>
            <input type="number" step="0.01" id="edit_amount" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" onclick="saveEdit()">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<script>

function loadPayments() {
    $.ajax({
        url: '../../handlers/admin_payments.php',
        method: 'GET',
        success: function(data) {
            $('#paymentsTable').html(data);
        }
    });
}


function deletePayment(t_id) {
    if (!confirm('Delete this payment?')) return;
    $.ajax({
        url: '../../handlers/admin_payments.php',
        method: 'POST',
        data: { action: 'delete', t_id: t_id },
        dataType: 'json',
        success: function(response) {
            alert(response.message);
            loadPayments();
        }
    });
}


function updateStatus(t_id) {
    const status = $('#status_'+t_id).val();
    $.ajax({
        url: '../../handlers/admin_payments.php',
        method: 'POST',
        data: { action: 'update_status', t_id: t_id, status: status },
        dataType: 'json',
        success: function(response) {
            alert(response.message);
            loadPayments();
        }
    });
}


function editPayment(t_id) {
    const row = $('#paymentsTable').find('tr').filter(function() {
        return $(this).find('td:first').text() == t_id;
    });

    $('#edit_t_id').val(t_id);
    $('#edit_name').val(row.find('td:eq(1)').text());
    $('#edit_address').val(row.find('td:eq(2)').text());
    $('#edit_contact').val(row.find('td:eq(3)').text());
    $('#edit_amount').val(row.find('td:eq(4)').text().replace(/,/g,''));

    $('#editPaymentModal').modal('show');
}


function saveEdit() {
    const data = {
        action: 'edit',
        t_id: $('#edit_t_id').val(),
        name: $('#edit_name').val(),
        address: $('#edit_address').val(),
        contact: $('#edit_contact').val(),
        amount: $('#edit_amount').val()
    };

    $.post('../../handlers/admin_payments.php', data, function(response) {
        alert(response.message);
        $('#editPaymentModal').modal('hide');
        loadPayments();
    }, 'json');
}


$(document).ready(function() {
    loadPayments();
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
