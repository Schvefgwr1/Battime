import axios from "axios";


export const CodeVerify= async (Sms, setCookie, cookies, setStateNavigation)=>{

    function handleCookie(pass) {
        setCookie("pass", pass, { path: "/" });
    }

    let url =   process.env.REACT_APP_URL + '/usercheck';
    let params = {
            Sms_User_Sent: Sms,
    }
    let headers = {
         Accept: 'application/json',
        //"Authorization": cookies.token,
    }
    const request = await axios.post(
        url,
        params,
        {
            headers:headers,
        },
    ).then(
        res => {
            console.log(res.data)
            handleCookie(res.data?.token)
            setStateNavigation(true);
        }
    ).catch(
        (error)=>{
            console.log(error)

        }
    )
}