<template>
  <div>
    <form @submit.prevent="submitFileAndData">
      <div class="form-group row">
        <label class="col-form-label col-md-2">Shop name</label>
        <div class="col-md-10">
          <input
            type="text"
            v-model="form.shop_name"
            name="shop_name"
            class="form-control"
          />
        </div>
      </div>

      <div class="form-group row">
        <label class="col-form-label col-md-2">Comapany Registration</label>
        <div class="col-md-10">
          <input
            type="text"
            v-model="form.company_reg"
            name="company_reg"
            class="form-control"
          />
        </div>
      </div>

      <div class="form-group row">
        <label class="col-form-label col-md-2">email</label>
        <div class="col-md-10">
          <input
            type="email"
            v-model="form.shop_email"
            name="shop_email"
            class="form-control"
          />
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-md-2">Shop Phone Number</label>
        <div class="col-md-10">
          <input
            type="text"
            v-model="form.shop_phone_number"
            name="shop_phone_number"
            class="form-control"
          />
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-md-2">Logo</label>
        <div class="col-md-10">
          <input
            class="form-control"
            type="file"
            name="shop_logo"
            ref="shop_logo"
            v-on:change="handleFileLogoUpload()"
          />
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-md-2">Documents</label>
        <div class="col-md-10">
          <input
            class="form-control"
            type="file"
            name="shop_document"
            ref="shop_document"
            v-on:change="handleFileDocumentUpload()"
          />
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-md-2">Category</label>
        <div class="col-md-10">
          <select
            class="form-control"
            v-model="form.shop_category"
            name="shop_category"
          >
            <option>-- Select --</option>
            <option value="electronics">Electronics</option>
            <option value="clothing">Clothing</option>
            <option value="food">Food</option>
            <option value="furniture">Furniture</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-md-2">Shop Description</label>
        <div class="col-md-10">
          <textarea
            rows="5"
            cols="5"
            class="form-control"
            placeholder="Enter Description"
            v-model="form.shop_description"
            name="shop_description"
          ></textarea>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary center">
            Provision
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      shop_logo: "",
      shop_document: "",
      form: {
        status: null,
        shop_name: null,
        shop_email: null,
        company_reg: null,
        shop_category: null,
        shop_description: null,
        shop_phone_number: null,
      },
    };
  },
  methods: {
    handleFileLogoUpload() {
      this.shop_logo = this.$refs.shop_logo.files[0];
    },
    handleFileDocumentUpload() {
      this.shop_document = this.$refs.shop_document.files[0];
    },
    submitFileAndData() {
      let formData = new FormData();

      formData.append("shop_logo", this.shop_logo);
      formData.append("shop_document", this.shop_document);
      formData.append("shop_name", this.form.shop_name);
      formData.append("shop_email", this.form.shop_email);
      formData.append("company_reg", this.form.company_reg);
      formData.append("shop_category", this.form.shop_category);
      formData.append("shop_description", this.form.shop_description);
      formData.append("shop_phone_number", this.form.shop_phone_number);

      this.loading = true;
      axios
        .post("/seller/register/shop", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          this.loading = false;
          window.location.href = '/seller/product-success';
        })
        .catch((error) => {
          this.loading = false;
          window.location.href = '/seller/product-fail';
        });
    },
  },
};
</script>