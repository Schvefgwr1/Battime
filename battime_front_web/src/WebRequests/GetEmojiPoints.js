import axios from "axios";


export const GetEmojiPoints = async (
    cookies,
    setPoints,
    setState,
    setMapRenderingState
)=>{
    setState("loading")
    let url= process.env.REACT_APP_URL + '/establishment_emoji_point';
    let headers = {
        Accept: 'application/json',
        Authorization: "Bearer " + cookies?.pass,
    }
    const request = await axios.get(
        url,
        {
            headers:headers,
        },
    ).then(
        res => {
            console.log(res.data);
            setPoints(res?.data?.data);
            setState("main")
            setMapRenderingState(true)
        }
    ).catch(
        (error)=>{
            console.log(error)
            setState("error")
        }
    )
}