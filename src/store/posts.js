import axios from 'axios';




const state = () => ({
  posts: [],
  post: {}
});


const getters = {
  getPosts(state) {
    return state.posts;
  },
  getPost(state) {
    return state.post;
  }
}

const mutations = {
  setPosts(state, payload){
    state.posts = payload;
  },
  setPost(state, payload){
    state.post = payload;
  }
}

const actions = {
  async newuser ({ commit }, payload){
    console.log("im here!")
    let res = await axios.post('http://192.168.8.234:8080/PEESOCESPRO/new_user.php',payload );
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