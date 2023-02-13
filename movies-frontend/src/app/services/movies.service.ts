import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';


@Injectable({
  providedIn: 'root'
})
export class MoviesService {


  

  
  constructor(private httpClient:HttpClient) { }

  getMovies()
  {
   return this.httpClient.get("http://localhost:80/php-bajaj-training/movies-api/movies");
  }

  getMovie(id:any)
  {
    return this.httpClient.get(`http://localhost:80/php-bajaj-training/movies-api/movies/${id}`)
  }

  createReview(data:any)
  {
    let headers={"Content-Type":"application/json"};
    return this.httpClient.post("http://localhost:80/php-bajaj-training/movies-api/reviews",data,{headers});
  }


}
