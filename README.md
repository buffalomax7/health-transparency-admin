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
  - HEALTH_PRICE_INDEX
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

## Work Queue List
This is after we ran our ETL, if errors arise, how can we fix in a dashboard.
- type_id
- data: json
  - This stores different information depending on the type
  - For instance:
    - CPT_NOT_MATCHED = This would show information to help match this in the DB
    - PAYER_CONTRACT_NOT_FOUND = This would show contract information, etc.

## Work Queue Types List (Table or just array?)
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
- crawler_link: string
- last_crawled: datatime
- last_updated: datetime
- last_updated_given_by_file: datetime

## Payer Systems List - DONE
- name: string
- website: string
- address: string
- city: string
- state: string
- zip: string

## Payer List - DONE
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

## HCPCS List - DONE
- code: string
- short_description: string
- long_description: string

## Master CPT List - DONE
- code: string
- short_description: string
- long_description: string

## Master DRG List - DONE
- code: string
- short_description: string
- long_description: string

## Hospital Code Mapper List (Many to many needed?) - DONE?
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

## Contract Categories List - DONE
- name: string (HMO, PPO)
- description: string, nullable

## Crawl Links
- crawl_linkable_type: string (MorphTo) (Hospital, Payer?)
- crawl_linkable_id: int
- providerable_type: string (Transparency Provider)
- providerable_id: int 
- url: string
- status: string
- 
## Crawler
- crawl_link_id: int
- crawl_status: string (not-started, pending, finished, error)
- filename: string
- import_status: string (not-started, pending, finished, error)
- data: json
