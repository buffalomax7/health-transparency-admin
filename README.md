# Health Transparency Price ETL Script

## TODO:
- [ ] Filament Install
- [ ] FA - Transparency Providers CRUD
- [ ] FA - Transparency Providers Version CRUD
- [ ] FA - Hospital System CRUD
- [ ] FA - Hospital CRUD
 
## General Thoughts:

Create ETL 'models' that work for a provider:

i.e. ClaraPrice model, SlicedHealth model

Inside of a model, we have a version number that could alter the import process

How to handle 1 offs? CSV files etc.

## Transparency Providers List - DONE
- name: string
  - CLARA_PRICE
    - Version
      - 1
      - 2
      - 3
  - HEALTH_PRICE_INDEX
    - Version
      - 1
      - 2
      - 3
  - CSV
    - Version
      - FCH_TEXAS
      - WISE_COUNTY_HEALTH
- description: string
- website: string

## Transparency Providers Version List - DONE
- transparency_provider_id
- version: string
- description: string
- first_seen_date: date
  - Basically, helpful for any hospital added after this date is probably using the latest version.

## Processing Needed List
This is after we ran our ETL, if errors arise, how can we fix in a dashboard.
- type_id
- data: json
  - This stores different information depending on the type
  - For instance:
    - CPT_NOT_MATCHED = This would show information to help match this in the DB
    - PAYER_CONTRACT_NOT_FOUND = This would show contract information, etc.

## Processing Needed Types List (DB needed or just array in config?)
- name: string (CPT_NOT_MATCHED, PAYER_CONTRACT_NOT_FOUND, etc)
- description: string

## Hospital System List - DONE
- name: string
- description: string
- website: string

## Hospital List - DONE
- hospital_system_id: unsignedBigInterger
- name: string
- website: string
- address: string
- city: string
- state: string
- zip: string
- number_of_beds: unsignedInteger
- gross_revenue: unsignedBigInteger
- trauma_designation: string

## Payer List
- name: string
- website: string
- address: string
- city: string
- state: string
- zip: string

## Payer Subsidiaries List
- payer_id: unsignedBigInteger
- name: string
- website: string (nullable)
- address: string (nullable)
- city: string (nullable)
- state: string (nullable)
- zip: string (nullable)

## Payer Subsidiary Contract List
- payer_subsidiary_id: unsignedBigInteger
- type: string (HMO, PPO, etc)

## HCPCS List (CMS for free?)
- code: string
- name: string
- description: string

## Master CPT List (License needed?)
- code: string
- name: string
- description: string

## Master DRG List (License needed?) (Same table as CPT?)
- code: string
- name: string
- description: string

## Hospital Code Mapper List (Many to many needed?)
- morphable_type(master_cpt_list || master_drg_list)
- morphable_id
- hospital_id: unsignedBigInteger
- code: string
- name: string
- description: string

## Contract Types List
- name
  - PERCENT_OF_CHARGES
  - CHARGE_MASTER

## Hospital Contract List?
- hospital_id
- payer_subsidiary_contract_id
- estimated_contract_type_id
- confirmed_contract_type_id
- 
