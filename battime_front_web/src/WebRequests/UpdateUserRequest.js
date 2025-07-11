import axios from "axios";


export const UpdateUserRequest = async (Date, cookies, setState, setINeedToLoad)=> {

    setState("loading");
    let url= process.env.REACT_APP_URL + '/update_profile';
    let params = {
        Users_NumberPhone: Number(Date[1]),
        name: Date[2],
        user_lastname: Date[3],
        user_mail: Date[4],
        photo_avatar: Date[0]

    }
    let headers = {
        'Accept': 'application/json',
        'Authorization': "Bearer " + cookies?.pass,
        'Content-Type': 'multipart/form-data',
    }
    console.log(headers);
    const request = await axios.post(
        url,
        params,
        {
            headers:headers,
        },
    ).then(
        res => {
            console.log(res.data)
            if(res.data?.message === "The data has been successfully updated") {
                setINeedToLoad(1);
                setState("main");
            } else {
                setState("error");
            }
        }
    ).catch(
        (error)=>{
            console.log(error);
            setState("error");
        }
    )
}