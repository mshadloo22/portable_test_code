
export class Customer {
  constructor(
       public id: number,
       public name: string,
       public nationality: string,
       public age?: number,
       public lstSubject?:Object[]
   ) {}
}
