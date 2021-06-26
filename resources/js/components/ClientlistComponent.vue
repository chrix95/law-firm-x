<template>
  <div>
    <div class="d-flex justify-content-end align-items-center">
      <div class="col-md-3 mb-3">
        <input
          type="text"
          class="form-control"
          placeholder="Search"
          v-model="searchParam"
          @keyup="filterResult()"
        />
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Legal counsel</th>
            <th scope="col">Date profiled</th>
            <th scope="col">[ACTION]</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in contents" :key="index">
            <th scope="row">{{ index + 1 }}</th>
            <td>{{ item.firstname }}</td>
            <td>{{ item.lastname }}</td>
            <td>{{ item.legal_counsel }}</td>
            <td>{{ new Date(item.created_at).toDateString() }}</td>
            <td>
              <a
                href="#"
                class="pointer-cursor"
                @click.prevent="viewClient(item.client_id)"
              >
                Preview
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
export default {
  name: "ClientList",
  props: {
    clients: {
      required: true,
      type: [Array],
    },
  },
  data() {
    return {
      contents: [],
      searchParam: ''
    };
  },
  mounted() {
    this.contents = this.clients
  },
  methods: {
    filterResult() {
      if (this.searchParam.length > 0) {
        this.contents = this.clients.filter(row => {
          const lastname = row.lastname.toLowerCase()
          const searchTerm = this.searchParam.toLowerCase()
          return lastname.includes(searchTerm)
        })
      } else {
        this.contents = this.clients
      }
    },
    viewClient(clientId) {
      window.location = `${window.origin}/preview/${clientId}`;
    },
  },
};
</script>
<style scoped>
.pointer-cursor {
  cursor: pointer;
}
</style>