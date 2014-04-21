class CreateWorkshops < ActiveRecord::Migration
  def change
    create_table :workshops do |t|
      t.string :name
      t.references :attendee, index: true
      t.datetime :starts_at
      t.datetime :ends_at
      t.boolean :rescheduled
      t.string :room_name
      t.string :building_name

      t.timestamps
    end
  end
end
