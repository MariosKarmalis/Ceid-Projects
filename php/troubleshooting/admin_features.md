# Admin System

Available by :
  
- `PC`
___
### 1. LOGIN SYSTEM :  
 - [x] Standard Username - Password Login System

### 2. DASHBOARD DB PRESENTATION :
  Info displayed in tables and/or graphs.  
  Info :  
  - [x] User activity type distribution (`entries percentage per activity type`)
  - [x] Entries distribution per User.
  - [x] Entries distribution per Month.
  - [x] Entries distribution per WeekDay.
  - [x] Entries distribution per Hour.
  - [x] Entries distribution per Year.
  
#### Info Display on Map: 
 *Choices* :  
  + [x] Year
  + [x] Month (Jan - Dec)
  + [x] Day (Mon - Sun)
  + [x] Hour (0 - 23)
  + [x] Activity Type  
 
  `All of which support range queries!`

**ex.**
|       |                   |
|-------|------------------:|
|Year   | `2015 - 2016`     |
|Month  | `-`               |
|Day    | `Friday`          |
|Hour   | `-`               |
|ActType| `WALKING,IN_CAR`  |

> - [x] Map display via heatmap.
---

### 3. DATA DELETION : 
- [x] After confirmation the system deletes all the data in the database.

### 4. DATA EXTRACTION :
  After selecting a data display query, the selected data can be exported to :  
  - [x] CSV 
  - [x] XML
  - [x] JSON

**Each entry**  
**ex.**
|location_id|loc_timestamp|lat|long|accuracy|velocity|altitude|heading|act_timestamp|type|confidence|userid|            
|-----------|-------------|---|----|--------|--------|--------|-------|-------------|----|----------|------|
|`5496`|`2013-06-01 01:49:59`|`38.22841360`|`21.74595380`|`45`||||`2013-06-01 02:06:38`|`STILL`|`100`|`5`