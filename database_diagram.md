# Barbershop Database Entity-Relationship Diagram

```mermaid
erDiagram
    USERS ||--o| CUSTOMER_PROFILES : has
    USERS ||--o| BARBERS : has
    USERS {
        bigint id PK
        string name
        string email
        timestamp email_verified_at
        string password
        string remember_token
        enum role "admin,customer,barber"
        timestamp created_at
        timestamp updated_at
    }
    
    CUSTOMER_PROFILES {
        bigint id PK
        bigint user_id FK
        string phone
        text address
        int loyalty_points
        enum loyalty_level "bronze,silver,gold"
        date last_visit_date
        text notes
        timestamp created_at
        timestamp updated_at
    }
    
    BARBERS {
        bigint id PK
        bigint user_id FK
        text bio
        int experience_years
        string profile_image
        enum status "active,inactive"
        timestamp created_at
        timestamp updated_at
    }
    
    SERVICE_CATEGORIES ||--|{ SERVICES : contains
    SERVICE_CATEGORIES {
        bigint id PK
        string name
        text description
        timestamp created_at
        timestamp updated_at
    }
    
    SERVICES {
        bigint id PK
        bigint category_id FK
        string name
        text description
        decimal price
        int duration "minutes"
        string image
        enum status "active,inactive"
        timestamp created_at
        timestamp updated_at
    }
    
    BARBERS ||--|{ BARBER_SERVICE : offers
    SERVICES ||--|{ BARBER_SERVICE : provided_by
    BARBER_SERVICE {
        bigint barber_id PK,FK
        bigint service_id PK,FK
    }
    
    BARBERS ||--|{ WORKING_HOURS : has
    WORKING_HOURS {
        bigint id PK
        bigint barber_id FK
        tinyint day_of_week "0=Sun to 6=Sat"
        time start_time
        time end_time
        boolean is_day_off
        timestamp created_at
        timestamp updated_at
    }
    
    USERS ||--|{ APPOINTMENTS : books
    BARBERS ||--|{ APPOINTMENTS : serves
    SERVICES ||--|{ APPOINTMENTS : includes
    APPOINTMENTS {
        bigint id PK
        bigint customer_id FK
        bigint barber_id FK
        bigint service_id FK
        date appointment_date
        time start_time
        time end_time
        enum status "pending,confirmed,completed,cancelled"
        text notes
        timestamp created_at
        timestamp updated_at
    }
    
    STYLES {
        bigint id PK
        string name
        text description
        string image
        boolean is_trending
        timestamp created_at
        timestamp updated_at
    }
    
    USERS ||--|{ CUSTOMER_STYLE : has
    STYLES ||--|{ CUSTOMER_STYLE : used_in
    APPOINTMENTS ||--o| CUSTOMER_STYLE : results_in
    CUSTOMER_STYLE {
        bigint id PK
        bigint customer_id FK
        bigint style_id FK
        bigint appointment_id FK
        string image
        date date
        text notes
        timestamp created_at
        timestamp updated_at
    }
    
```

## Relationship Legend
- `||--o|`: One-to-zero-or-one relationship
- `||--|{`: One-to-many relationship
- `}|--|{`: Many-to-many relationship

## Key
- PK: Primary Key
- FK: Foreign Key

