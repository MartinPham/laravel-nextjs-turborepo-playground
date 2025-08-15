// Generated TypeScript types from Spec specification

// Schema 
export type Car = {
  id: number;
  model?: string | null;
  mechanic?: Mechanic | null;
  owner?: User | null;
  plate?: Plate | null;
}

export type Car_LengthAwarePaginator = {
  current_page: number;
  first_page_url: string;
  from: number;
  last_page: number;
  last_page_url: string;
  links: { url?: string; label?: string; active?: boolean }[];
  next_page_url: string;
  path: string;
  per_page: number;
  prev_page_url: string;
  to: number;
  total: number;
  data: Car[];
}

export type Plate = {
  id: number;
  number: string;
  car?: Car | null;
}

export type User = {
  id: number;
  name: string;
  email: string;
  car?: Car | null;
  carPlate?: Plate | null;
}

export type Mechanic = {
  id: number;
  name?: string | null;
  cars?: Car[] | null;
  clients?: User[] | null;
}


// Route & Response Types
export type GarageCarProps = Car;
export const GarageCarRouteId = 'garage.car';

export type GarageCarsProps = Car_LengthAwarePaginator;
export const GarageCarsRouteId = 'garage.cars';

export type GarageUserProps = { user?: User; car?: Car; plate?: Plate; mechanic?: Mechanic; requestedTime?: string };
export const GarageUserRouteId = 'garage.user';

