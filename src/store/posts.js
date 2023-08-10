import axios from 'axios';

axios.defaults.baseURL = process.env.VUE_APP_API_URL;


const state = () => ({
  posts: [],
  post: {},
  
});


const getters = {
  getPosts(state) {
    console.log("Get Post",state);
    return state.posts;
  },
  getPost(state) {
    return state.post;
  }
}

const mutations = {
  setPosts(state, payload){
    console.log("Set Post",payload);
    state.posts = payload;
  },
  setPost(state, payload){
    state.post = payload;
  }
}

const actions = {

  async fetchUsers({commit}){
    let res = await axios.get(`http://10.0.1.23:80/PEESOCESPRO/users.php`); 
  /*  let res = await axios.get(`${process.env.VUE_APP_API_URL}/employees`);  */
    /*  let res = await axios.get(`/employees.php`); */
      
    // console.log("sample=",document.getElementsByClassName()
     commit('setPosts', res.data.users);
   },



  async newuser ({ commit }, payload){
    console.log("im here!")
    let res = await axios.post('http://10.0.1.23:80/PEESOCESPRO/new_user.php',payload );
    console.log("output=",res)
    commit('setPosts', res.data);

  }



  


}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}