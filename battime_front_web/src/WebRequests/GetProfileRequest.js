import axios from "axios";


export const GetProfileRequest = async (
    cookies, setState,
    setPhoneNumber,
    setFileLink,
    setFirstName,
    setLastName,
    setEmail
)=> {

    setState('loading');
    let url = process.env.REACT_APP_URL + '/get_profile';
    let headers = {
        'Accept': 'application/json',
        'Authorization': "Bearer " + cookies?.pass
    }
    const request = await axios.get(
        url,
        {
            headers:headers,
        },
    ).then(
        res => {
            console.log(res.data);
            setPhoneNumber(res.data?.phone_number);
            setFileLink(res.data?.profile_image);
            setFirstName(res.data?.user_firstname);
            setLastName(res.data?.user_lastname);
            setEmail(res.data?.user_mail);
            setState('main');
        }
    ).catch(
        (error)=>{
            console.log(error);
            setState('error');
        }
    )
}