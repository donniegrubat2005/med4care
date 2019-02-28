<template>
  <div class="row">
    <div class="col-md-3">
      <div class="card text-white bg-info">
        <div class="card-body">
          <div class="text-value">100.00 PHP</div>
          <div>Philippine Peso</div>
          <div class="progress progress-white progress-xs my-2">
            <div
              class="progress-bar"
              role="progressbar"
              style="width: 100%"
              aria-valuenow="100"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
          </div>
          <small class="text-muted">Currentt Balance</small>
        </div>
        <br>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <a href="/wallet/transfer" v-on:click="onLoadContent('Transfer')">
              Transfer PHP
              <i class="fa fa-angle-right float-right mt-1" aria-hidden="true"></i>
            </a>
          </li>
          <li class="list-group-item">
            <a href="/wallet/deposit" v-on:click="onLoadContent('Deposit')">
              Deposit PHP
              <i class="fa fa-angle-right float-right mt-1" aria-hidden="true"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-md-9">
      <div class="card text-left">
        <div class="card-header">
          <i class="fas fa-wallet"></i>
          My Wallet
        </div>
        <center style="margin-top:50px" v-if="isLoadingShow">
          <loading></loading>
        </center>

        <div class="card-body">
          <div class="row alertRow" v-if="isAlertShow">
            <div class="col-md-12">
              <div class="alert alert-info" role="alert">
                <strong>Warning!</strong>
                <a href="#" class="alert-link"></a>
              </div>
            </div>
          </div>
          <div v-if="isContentShow">
            <deposit-content v-show="title === 'deposit'"></deposit-content>
            <transfer-content v-show="title === 'transfer'"></transfer-content>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      isLoadingShow: false,
      isContentShow: false,
      isAlertShow: true,
      title: ""
    };
  },
  mounted() {
    var URLName = window.location.href.split("/").pop();

    switch (URLName) {
      case "wallet":
        break;
      default:
        this.isContentShow = true;

        var params = URLName.split("?");

        if (params.length > 1) {
          this.title = params[0];
        } else {
          this.title = URLName;
        }
        this.isAlertShow = false;
        break;
    }
  },
  methods: {
    onLoadContent(name) {
      this.isLoadingShow = true;
      this.isContentShow = true;
      this.isAlertShow = false;
      this.isContentShow = false;
    }
  }
};
</script>


<style scoped>
.list-link li {
  color: #000;
}
.card-title {
  text-transform: capitalize;
}
</style>

