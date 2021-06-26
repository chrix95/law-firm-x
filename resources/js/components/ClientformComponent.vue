<template>
  <form @submit.prevent="createClient()">
    <div class="row">
      <div class="col">
        <div class="mb-3">
          <label for="firstName" class="form-label">Firstname</label>
          <input
            type="text"
            class="form-control"
            id="firstName"
            v-model="payload.firstname"
          />
        </div>
      </div>
      <div class="col">
        <div class="mb-3">
          <label for="lastName" class="form-label">Lastname</label>
          <input
            type="text"
            class="form-control"
            id="lastName"
            v-model="payload.lastname"
          />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="mb-3">
          <label for="emailAddress" class="form-label">Email address</label>
          <input
            type="email"
            class="form-control"
            id="emailAddress"
            v-model="payload.email"
          />
        </div>
      </div>
      <div class="col">
        <div class="mb-3">
          <label for="primaryCounsel" class="form-label"
            >Primary Legal counsel</label
          >
          <input
            type="text"
            class="form-control"
            id="primaryCounsel"
            v-model="payload.legal_counsel"
          />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="mb-3">
          <label for="dob" class="form-label">Date of Brth</label>
          <input
            class="form-control"
            type="date"
            id="dob"
            v-model="payload.dob"
          />
        </div>
      </div>
      <div class="col">
        <div class="mb-3">
          <label for="imageFile" class="form-label"
            >Profile image (optional)</label
          >
          <input
            class="form-control"
            type="file"
            id="imageFile"
            @change="onFileChange"
          />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="mb-3">
          <label for="caseDetails" class="form-label">Case details</label>
          <textarea
            class="form-control"
            id="caseDetails"
            rows="4"
            v-model="payload.case_detail"
          ></textarea>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="d-grid gap-2 col-6 mx-auto">
          <button class="btn btn-primary" type="submit" :disabled="loading">
            {{ !loading ? "Submit" : "Processing" }}
          </button>
        </div>
      </div>
    </div>
  </form>
</template>
<script>
import RequestService from "../services/Request";
export default {
  name: "ClientForm",
  mounted() {},
  data() {
    return {
      loading: false,
      payload: {
        case_detail: "",
        legal_counsel: "",
      },
    };
  },
  methods: {
    onFileChange(e) {
      this.payload.image = e.target.files[0];
      console.log(e.target.files[0]);
    },
    showAlert(type, message, title) {
      this.$swal(
        title ? title : "Validation error",
        message ? message : "",
        type ? type : "warning"
      );
    },
    createClient() {
      if (this.validatePayload()) {
        this.loading = true;
        let formData = new FormData();
        formData.append("firstname", this.payload.firstname);
        formData.append("lastname", this.payload.lastname);
        formData.append("email", this.payload.email);
        formData.append("legal_counsel", this.payload.legal_counsel);
        formData.append("image", this.payload.image);
        formData.append("dob", this.payload.dob);
        formData.append("case_detail", this.payload.case_detail);
        RequestService.createClient(formData)
          .then((result) => {
            if (result.data.status) {
              this.showAlert("success", result.data.message, "Viola!");
              this.payload = {};
            } else {
              this.showAlert("error", result.data.message);
            }
          })
          .catch((err) => {
            console.log(err.response);
            if (err.response.status == 500) {
              this.showAlert(
                "error",
                err.response.data.message,
                "Server error"
              );
            } else {
              this.showAlert("warning", err.response.data.message);
            }
          })
          .finally(() => {
            this.loading = false;
          });
      }
    },
    validatePayload() {
      if (this.payload.firstname) {
        if (this.payload.lastname) {
          if (this.payload.email) {
            if (this.payload.legal_counsel) {
              if (this.payload.dob) {
                if (this.payload.case_detail) {
                  return true;
                } else {
                  this.showAlert("warning", "Case detail is mandatory");
                }
              } else {
                this.showAlert("warning", "Date of Birth is mandatory");
              }
            } else {
              this.showAlert("warning", "A legal counsel needs to be provided");
            }
          } else {
            this.showAlert("warning", "Email address is mandatory");
          }
        } else {
          this.showAlert("warning", "Lastname is mandatory");
        }
      } else {
        this.showAlert("warning", "Firstname is mandatory");
      }
    },
  },
};
</script>
<style scoped>
</style>