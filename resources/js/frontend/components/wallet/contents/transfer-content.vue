<template>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-responsive-sm">
        <thead>
          <tr>
            <th>Username</th>
            <th>Date registered</th>
            <th>Role</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Pompeius René</td>
            <td>2012/01/01</td>
            <td>Member</td>
            <td>
              <span class="badge badge-success">Active</span>
            </td>
          </tr>
          <tr>
            <td>Paĉjo Jadon</td>
            <td>2012/02/01</td>
            <td>Staff</td>
            <td>
              <span class="badge badge-danger">Banned</span>
            </td>
          </tr>
          <tr>
            <td>Micheal Mercurius</td>
            <td>2012/02/01</td>
            <td>Admin</td>
            <td>
              <span class="badge badge-secondary">Inactive</span>
            </td>
          </tr>
          <tr>
            <td>Ganesha Dubhghall</td>
            <td>2012/03/01</td>
            <td>Member</td>
            <td>
              <span class="badge badge-warning">Pending</span>
            </td>
          </tr>
          <tr>
            <td>Hiroto Šimun</td>
            <td>2012/01/21</td>
            <td>Staff</td>
            <td>
              <span class="badge badge-success">Active</span>
            </td>
          </tr>
        </tbody>
      </table>
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="#">Prev</a>
        </li>
        <li class="page-item active">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">4</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </div>
  </div>

  <!-- <div class="row">
    <div class="col-md-8">
      <h4>{{title}}</h4>
      <button class="btn btn-info float-right" id="add-form">Add Form</button>
      <hr>
    </div>
    <div class="col-md-8">
      <br>
      <div class="card">
        <div class="card-body">
          <div class="con-header">
            <h5 class="card-title">FORM:</h5>
            <button class="btn btn-danger float-right btn-pill btnRmvFrom">X</button>
          </div>
          <form action>
            <div class="form-group">
              <label for="company">Company</label>
              <input
                class="form-control"
                id="company"
                type="text"
                placeholder="Enter your company name"
              >
            </div>
            <div class="form-group">
              <label for="vat">VAT</label>
              <input class="form-control" id="vat" type="text" placeholder="PL1234567890">
            </div>
            <div class="form-group">
              <label for="street">Street</label>
              <input class="form-control" id="street" type="text" placeholder="Enter street name">
            </div>
            <div class="row">
              <div class="form-group col-sm-8">
                <label for="city">City</label>
                <input class="form-control" id="city" type="text" placeholder="Enter your city">
              </div>
              <div class="form-group col-sm-4">
                <label for="postal-code">Postal Code</label>
                <input class="form-control" id="postal-code" type="text" placeholder="Postal Code">
              </div>
            </div>

            <div class="form-group">
              <label for="country">Country</label>
              <input class="form-control" id="country" type="text" placeholder="Country name">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>-->
</template>


<script>
export default {
  data() {
    return {
      title: "Transfer"
    };
  }
};
</script>

<style scoped>
#add-form {
  margin-top: -40px;
}
.btnRmvFrom {
  margin-top: -70px;
  margin-right: -38px;
}
</style>
