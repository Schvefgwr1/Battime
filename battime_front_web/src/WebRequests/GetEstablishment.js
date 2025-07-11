import axios from "axios";
import {EstablishmentDTO} from "../Components/Map_user_mobile/DTO/EstablishmentDTO";


export const GetEstablishment = async (
    cookies,
    setState,
    setEstablishment,
    establishmentId
)=>{
    setState("loading")
    let url= process.env.REACT_APP_URL + '/establishment_card?establishment_id=' + establishmentId;
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
            console.log(res);
            if (res?.status === 200) {
                setEstablishment(new EstablishmentDTO(res.data));
                setState("main")
            }
            else {
                throw new Error("Неправильный статус ответа: " + res.status);
            }
        }
    ).catch(
        (error)=>{
            console.log(error);
            setState("error");
        }
    )
}