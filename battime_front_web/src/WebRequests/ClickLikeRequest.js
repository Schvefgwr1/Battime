import axios from "axios";
import {LikedRequest} from "./UserLikesRequest";


export const SetLikeRequest= async (cookies, setLiked, establishment)=> {

    let url =   process.env.REACT_APP_URL + '/establishments/' + establishment?.id + '/like';
    let params = {}
    let headers = {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'Authorization': "Bearer " + cookies?.pass
    }
    const request = await axios.post(
        url,
        params,
        {
            headers:headers,
        },
    ).then(
        res => {
            console.log(res.data);
            establishment.setLikes(res.data?.count);
            LikedRequest(cookies, setLiked);
        }
    ).catch(
        (error)=>{
            console.log(error);
        }
    )
}
