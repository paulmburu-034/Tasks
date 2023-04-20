import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

axios.defaults.baseURL = "http://127.0.0.1:8000/api/";
export default function useUserTasks(){
    const usertasks = ref([]);
    const usertask = ref([]);
    const users = ref([]);
    const errors = ref({});
    const router = useRouter();

    const getUserTasks = async() => {
        const response = await axios.get("usertasks");
        usertasks.value = response.data.data;
    };
    const getUsers = async() => {
        const response = await axios.get("users");
        users.value = response.data.data;
    };
    const getUserTask = async(id) => {
        const response = await axios.get("usertasks/" + id);
        usertask.value = response.data.data;
    };
    const storeUserTask = async(data) => {
        try{
            await axios.post("usertasks", data);
            await router.push({ name: "UserTasksIndex" });
        }catch(error){
            if(error.response.status === 422){
                errors.value = error.response.data.errors;
            }
        }
    };
    const updateUserTask = async(id) => {
        try{
            await axios.put("usertasks/" + id, usertask.value);
            await router.push({ name: "UserTasksIndex" });
        }catch(error){
            if(error.response.status === 422){
                errors.value = error.response.data.errors;
            }
        }
    };
    const destroyUserTask = async(id) => {
        if(!window.confirm("Are you Sure?")){
            return;
        }
        await axios.delete("usertasks/" + id);
        await getUserTasks();
    };

    return {
        users,
        errors,
        getUsers,
        usertask,
        usertasks,
        getUserTask,
        getUserTasks,
        storeUserTask,
        updateUserTask,
        destroyUserTask,
    };
}