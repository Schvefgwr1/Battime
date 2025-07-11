import axios from "axios";


export const LikedRequest= async (cookies, setLiked )=> {

    let url =   process.env.REACT_APP_URL + '/establishments/liked';
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
            setLiked(res.data);
        }
    ).catch(
        (error)=>{
            console.log(error);
        }
    )
}
