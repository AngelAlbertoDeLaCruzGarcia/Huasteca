import Axios from 'axios'
import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
const state = {
    todos: [
        { id: 1, text: '...', done: true },
        { id: 2, text: '...', done: false },
    ],
    count: 100,
    datosUsuario:null,
    auth:false,
}
// mutations are operations that actually mutate the state.
// each mutation handler gets the entire state tree as the
// first argument, followed by additional payload arguments.
// mutations must be synchronous and can be recorded by plugins
// for debugging purposes.
const mutations = {
    increment (state) {
    state.count++
    },
    decrement (state) {
        state.count--
    },
    setUsuario(state,valor){
        state.datosUsuario=valor;
        state.auth=Boolean(valor);
    },
}

const actions = {
/*
    increment: ({ commit }) => commit('increment'),
    decrement: ({ commit }) => commit('decrement'),
    incrementIfOdd ({ commit, state }) {
        if ((state.count + 1) % 2 === 0) {
        commit('increment')
        }
    },*/

    async logout({dispatch}){
         Axios.post("/logout");
        return dispatch("getUsuario");
    },
    async obtenerUsuario({dispatch}){
        return dispatch("getUsuario");
    },

    getUsuario( {commit} ) {
        Axios.get('/datos')
        .then(res=>{commit('setUsuario',res.data) })
        .catch( () => {commit('setUsuario',null)} );
        console.log(this.state.datosUsuario.name);
    }

}/*
incrementAsync ({ commit }) {
    return new Promise((resolve, reject) => {
    setTimeout(() => {
        commit('increment')
        resolve()
    }, 1000)
    })
}*/

// getters are functions.
const getters = {
    evenOrOdd: state => state.count % 2 === 0 ? 'even' : 'odd',
    doneTodos: state => {
        return state.todos.filter(todo => todo.done);
    },
    doneTodosCount: (state, getters) => {
        return getters.doneTodos.length
    },
    getTodoById: (state) => (id) => {
        return state.todos.find(todo => todo.id === id)
    }
}

// A Vuex instance is created by combining the state, mutations, actions,
// and getters.
export default new Vuex.Store({
state,
getters,
actions,
mutations
})
