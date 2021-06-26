<template>
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
        <tr v-for="(item, index) in clients" :key="index">
          <th scope="row">{{ index + 1 }}</th>
          <td>{{ item.firstname }}</td>
          <td>{{ item.lastname }}</td>
          <td>{{ item.legal_counsel }}</td>
          <td>{{ new Date(item.created_at).toDateString() }}</td>
          <td>
              <a href="#" class="pointer-cursor" @click.prevent="viewClient(item.client_id)">
                Preview
              </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
    name: "ClientList",
    props: {
        clients: {
            required: true,
            type: [Array]
        }
    },
    data() {
        return {
            
        }
    },
    mounted() {

    },
    methods: {
        viewClient(clientId) {
            window.location = `${window.origin}/preview/${clientId}`
        }
    },
}
</script>
<style scoped>
.pointer-cursor {
    cursor: pointer;
}
</style>