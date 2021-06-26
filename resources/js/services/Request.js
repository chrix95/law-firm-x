import Api from "./Api";
const config = {
    headers: { 'content-type': 'multipart/form-data' }
}
export default {
    createClient(payload) {
        return Api().post("create-client", payload, config);
    }
};