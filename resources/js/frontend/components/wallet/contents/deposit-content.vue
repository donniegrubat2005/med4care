<template>
  <div class="row">
    <div class="col-md-6">
      <h4 class="card-title">{{title}}</h4>
    </div>
    <div class="col-md-6">
      <ul class="list-inline float-right">
        <li class="list-inline-item">
          <button class="btn btn-primary btn-sm">Add</button>
        </li>
        <li class="list-inline-item">
          <button class="btn btn-primary btn-sm">Add</button>
        </li>
      </ul>
    </div>
    <div class="col-md-12">
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
</template>



<script>
export default {
  data() {
    return {
      title: "Deposit"
    };
  }
};
</script>

<style scoped>
</style>
