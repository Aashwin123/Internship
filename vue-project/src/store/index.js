import {createStore} from 'vuex'

const store = createStore({
    state(){
        return{
            count:0
        }
    },
    getters:{
        doubleCount(state){
            return state.count * 2
        }
    },
    mutations:{
        increment(state){
            state.count++
        }
    },
    actions:{
        incrementAsync({commit}){
            setTimeout(() => {
                commit('increment')
            },1000)
        }
    }
})
export default store